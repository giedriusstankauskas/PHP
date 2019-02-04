<?php
  if(isset($_POST['knopke'])) {
    function plotas($num1, $num2) {
    $daugyba = $num1 * $num2;
    return $daugyba;
    };
    $result = plotas($_POST['pirmaKrastine'], $_POST['antraKrastine']);
    echo 'Stačiakampio ilgis yra: ' . $_POST['pirmaKrastine'] . '<br>';
    echo 'Stačiakampio plotis yra: ' . $_POST['antraKrastine'] . '<br>';
    echo "Stačiakampio plotas yra: $result m2";
    exit();
  };
?>


<!DOCTYPE html>
<html lang="">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title></title>
</head>

<body>
  <h3>Stačiakampio ploto skaičiavimas</h3>
  <form action="<?php $_PHP_SELF; ?>" method="POST">
    Įveskite stačiakampio ilgį: <input type="text" name="pirmaKrastine">
    Įveskite stačiakampio plotį: <input type="text" name="antraKrastine">
    <input type="submit" name="knopke">
  </form>

</body>
</html>
