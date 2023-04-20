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
    $preresult = strcmp($str1, $str2);
    if ($preresult == 0) {
        $result = true;
        return $result;
    } else {
        $result = false;
        return $result;
    }
}
