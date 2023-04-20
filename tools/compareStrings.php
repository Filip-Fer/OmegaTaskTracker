<?php
/**
* Funkce pro porovnání stringů 
* 
* @param string $str1
* @param string $str2
* @return boolean $result 
*/
function compare_strings($str1, $str2) {
    $str1 = strtolower($str1);
    $str2 = strtolower($str2);
    $result = strcmp($str1, $str2);
    return $result === 0;
}
