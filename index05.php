<?php
  $cities3 = [
    'Tokijas' => [13.6, 1868, 'Japonija'],
    'Vasingtonas' => [0.6, 1790, 'JAV'],
    'Maskva' => [11.5, 1147, 'Rusija']
  ];
  $cities3['Londonas'] = [8.6, 43, 'Anglija'];
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
    <ul>
      <li>
        <?php echo 'Gyventojų skaičius: ' .$cities3['Londonas'][0] .' mln.';?>
      </li>
      <li>
        <?php echo 'Įkurtas: ' .$cities3['Londonas'][1] .' m.';?>
      </li>
      <li>
        <?php echo 'Šalis: ' .$cities3['Londonas'][2];?>
      </li>
    </ul>
  </div>
</body>
</html>
