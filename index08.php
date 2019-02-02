<?php
  $temp = [4, 3, 9, 19, 19, 9, 12, 20, 24, 20, 12, 14, 18, 21, 20, 23, 16, 16, 15, 19, 19, 17, 17, 15, 12, 13, 13, 15, 19, 21];
  $average = round(array_sum($temp)/count($temp));
  rsort($temp);

  echo "Vidutine temperatura: $average <br>";

  $result = array_unique($temp);

  echo "Penkios šilčiausios temperatūros: ";
  $top = array_slice($result, 0, 5);
  foreach ($top as $tm) {
    echo "$tm, ";
  }
  echo '<br>';

  echo "Penkios šalčiausios temperatūros: ";
  $low = array_slice($result, -5, 5);
  foreach ($low as $tm) {
    echo "$tm, ";
  }
?>

<!DOCTYPE html>
<html lang="">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title></title>
</head>

<body>
  <div>

  </div>
</body>
</html>
