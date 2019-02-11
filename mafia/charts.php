<?php

require('users.php');


$db = new SQLite3('mydb');

$results['top'] = $db->query('SELECT count(*) as cnt, username, dt FROM users GROUP BY username ORDER BY cnt ASC');
$results['all'] = $db->query('SELECT username, dt FROM users ORDER BY dt ASC');

$selected_result = isset($_GET['show']) ? $_GET['show'] : 'all';

if( ! in_array($selected_result, ['all', 'top']) ) {
    echo 'oops'; exit;
}

if(isset($_GET['day'])) {
    if( ! is_numeric($_GET['day'])) {
        echo 'oops'; exit;
    }

    $day = $_GET['day'];
}
else {
    $day = 15;
}

$results['top'] = $db->query('SELECT count(*) as cnt, username, dt FROM users WHERE dt > "2016-02-'.($day-1).' 22:00" AND dt < "2016-02-'.($day).' 22:00" GROUP BY username ORDER BY cnt ASC');
$results['all'] = $db->query('SELECT username, dt FROM users WHERE dt > "2016-02-'.($day-1).' 22:00" AND dt < "2016-02-'.($day).' 22:00" ORDER BY dt ASC');

$userData = [];
$nightUsers = [];

while ($row = $results[$selected_result]->fetchArray()) {

    if(isset($userData[$row['username']])) {
        $time = new DateTime($row['dt']);
        $userData[$row['username']]['logs'][] = date('Y-m-d H:i', strtotime('+2 hours', $time->getTimestamp()));

        $count = count($userData[$row['username']]['logs']);

        if($count > 1) {
            $start = $userData[$row['username']]['logs'][$count - 2];
            $end = $userData[$row['username']]['logs'][$count - 1];

            $diffMin = (strtotime($end) - strtotime($start)) / 60;
            if($diffMin > 1) {
                $userData[$row['username']]['segments'][] = $userData[$row['username']]['segment'];

                $userData[$row['username']]['segment']['start'] = $userData[$row['username']]['segment']['start'] + $userData[$row['username']]['segment']['duration'] + $diffMin;
                $userData[$row['username']]['segment']['duration'] = 0;
            }
            else {
                $userData[$row['username']]['segment']['duration']++;
            }
        }
    }
    else {
        $time = new DateTime($row['dt']);
        $start = "2016-02-" . $day . " 00:00";
        $end = date('Y-m-d H:i', strtotime('+2 hours', $time->getTimestamp()));

        $userData[$row['username']]['logs'][] = $end;
        $userData[$row['username']]['segments'] = [];

        $userData[$row['username']]['segment']['start'] = (strtotime($end) - strtotime($start)) / 60;
        $userData[$row['username']]['segment']['duration'] = 0;

        $nightUsers[] = $row['username'];
    }
}

// echo '<pre>';
// print_r($userData);
// echo '</pre>';

$chartData = [];
uksort($userData, 'strcasecmp');
foreach($userData as $user => $data) {
    $row = new stdClass;

    $row->category = $user;
    $row->segments = $data['segments'];
    $row->segments[] = $data['segment'];

    $chartData[] = $row;
}

$db->close();
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>chrt</title>
        <link rel="stylesheet" href="style.css" type="text/css">
        <script src="js/amcharts/amcharts.js" type="text/javascript"></script>
        <script src="js/amcharts/serial.js" type="text/javascript"></script>
        <script src="js/amcharts/gantt.js" type="text/javascript"></script>

        <script>

        var chart = AmCharts.makeChart("chartdiv", {
            "type": "gantt",
            "period": "mm",
            "valueAxis": {
                "type": "date"
            },
            "brightnessStep": 0,
            "graph": {
                "fillAlphas": 1,
                "dateFormat":"JJ:NN",
                "balloonText":"[[open]] - [[value]]"
            },
            "rotate": true,
            "dataDateFormat":"YYYY-MM-DD",
            "categoryField": "category",
            "segmentsField": "segments",
            "startDate": "2015-02-<?php echo $_GET['day']; ?>",
            "startField": "start",
            "endField": "end",
            "durationField": "duration",
            "dataProvider": <?php echo json_encode($chartData); ?>,
            "chartCursor": {
                "valueBalloonsEnabled": false,
                "cursorAlpha": 0,
                "valueLineBalloonEnabled": true,
                "valueLineEnabled": true,
                "valueZoomable":true,
                "zoomable":false
            },

            "valueScrollbar": {
                "position":"top",
                "autoGridCount":true,
                "color":"#000000"
            }
        })
        </script>
    </head>

    <body>
        <form action="charts.php?show=all" method="get" style="text-align: center">
            <select name="day">
                <?php
                for($i = 15; $i < 26; $i++) {
                ?>
                <option value="<?php echo $i; ?>" <?php if($day == $i) { ?>selected="selected"<?php } ?>>Vasario <?php echo $i; ?></option>
                <?php
                }
                ?>
            </select>

            <input type="submit" value="rodyti">
        </form>

        <div id="chartdiv" style="width: 100%; height: 800px;"></div>

        <!-- <div>
            Naktį miegojo:<br>
            <?php // echo implode(', ', array_diff($users, $nightUsers)); ?>
        </div> -->
    </body>

</html>
