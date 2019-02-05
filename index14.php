<?php
$myDate = 2019;
$todayDate = date('Y');

if ($myDate < $todayDate) {
  echo '&copy ' . $myDate . '-' . $todayDate;
} else {
  echo '&copy ' . $todayDate;
}
?>
