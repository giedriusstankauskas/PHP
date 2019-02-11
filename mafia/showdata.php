<?php

require('users.php');


$db = new SQLite3('mydb');

$results['top'] = $db->query('SELECT count(*) as cnt, username, dt FROM users GROUP BY username ORDER BY cnt DESC');
$results['all'] = $db->query('SELECT username, dt FROM users WHERE dt < "2016-02-26 12:00" ORDER BY dt DESC');

$selected_result = isset($_GET['show']) ? $_GET['show'] : 'top';

if(isset($_GET['day'])) {
    $day = $_GET['day'];
    $results['top'] = $db->query('SELECT count(*) as cnt, username, dt FROM users WHERE dt > "2016-02-'.$day.' 19:00" AND dt < "2016-02-'.($day+1).' 07:00" GROUP BY username ORDER BY cnt DESC');
    $results['all'] = $db->query('SELECT username, dt FROM users WHERE dt > "2016-02-'.$day.' 19:00" AND dt < "2016-02-'.($day+1).' 07:00" ORDER BY dt DESC');
}

$output = '<table>';
$output .= '<tr><th>vieta</th><th>logintos min</th><th>nickname</th></tr>';
$i = 0;

while ($row = $results[$selected_result]->fetchArray()) {
    $i++;
    $output .= '<tr>';
    $output .= '<td>' . $i . '</td>';

    foreach($row as $key => $col)
        if( ! is_numeric($key) && $key != 'dt' ) $output .= '<td>' . $col . '</td>';

    $output .= '</tr>';
}

$output .= '</table>';

echo $output;

$db->close();
?>
