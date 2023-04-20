<?php
// Funkce pro generování náhodného hesla s určenou délkou
function generateRandomPassword($length) {
  $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
  $password = '';
  
  for ($i = 0; $i < $length; $i++) {
    $password .= $chars[rand(0, strlen($chars) - 1)];
  }
  
  return $password;
}

// Použití funkce pro vygenerování hesla s délkou 8 znaků
$password = generateRandomPassword(8);
echo "Vygenerované heslo: " . $password;
?>
