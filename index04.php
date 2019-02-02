<?php
  $cities = ['Berlynas', 'Roma', 'Londonas'];
  $cities[] = 'Tokijas';
  $cities2 = [
    'tokijas' => 13.6,
    'vasingtonas' => 0.6,
    'maskva' => 11.5
  ];
  $cities2['londonas'] = 8.6;
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
        <?php print_r($cities); ?>
      </li>
    </ul>
    <ul>
      <li>
        <?php echo 'Gyventoju skaicius: ' .$cities2['tokijas'] .'mln' ?>
      </li>
    </ul>
  </div>
</body>
</html>
