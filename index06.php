<?php
  $cities3 = [
    'Tokijas' => [13.6, 1868, 'Japonija'],
    'Vasingtonas' => [0.6, 1790, 'JAV'],
    'Maskva' => [11.5, 1147, 'Rusija']
  ];
  $cities3['Londonas'] = [8.6, 43, 'Anglija'];

  $metai = 1774;

  if ($metai > $cities3['Vasingtonas'][1]) {
    echo 'Vašingtonas yra JAV sostinė.';
  } elseif ($metai == $cities3['Vasingtonas'][1]) {
    echo 'JAV sostinė vis dar Filadelfijoje.';
  } else {
    echo 'Liko ' .($cities3['Vasingtonas'][1] - $metai) .' metai (-ų) iki Vašingtono
įkūrimo.';
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

</body>
</html>
