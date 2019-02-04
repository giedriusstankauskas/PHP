<?php
if(isset($_POST['knopke'])) {
  echo 'Jusu vardas: ' . $_POST['name'] . '<br>' . 'Jusu amzius: ' . $_POST['surname'];
  exit();
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
  <form action="<?php $_PHP_SELF; ?>" method="POST">
    Vardas: <input type="text" name="name">
    Pavarde: <input type="text" name="surname">
    <input type="submit" name="knopke">
  </form>
</body>
</html>
