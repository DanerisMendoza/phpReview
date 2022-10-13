<?php
$brandsA = [
    'a' => 'Louis Vuitton',
    'b' => 'Hermès',
    'c' => 'Gucci',
    'd' => 'Prada',
    'e' => 'Chanel',
    'f' => 'Cartier'
  ];
  $brandsB = [
    'b' => 'Tesla',
    'd' => 'Coca-cola',
    'e' => 'Google',
    'f' => 'Facebook'
  ];
  $replaced = array_replace($brandsA, $brandsB);
  echo"ReplaceArr: ";print_r($replaced);echo"</br>";
  // $brandsB = ['g' => 'accenture'];
  // echo"brandBWithPushArr : ";print_r($brandsB);echo"</br>";
?>