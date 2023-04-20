<?php

include './library.php';
getToString();



/**
 * Funkce pro zformátování data z databáze, vrací uživatelsky naformátované datum
 * 
 * @param string $input
 * @return string $formatted_date
 */
function formatDate($input)
  {
    $date = toString($input);
    $date_parts = explode('-', $date);
    $year = $date_parts[0];
    $month = $date_parts[1];
    $day = $date_parts[2];

    $formatted_date = $day . '. ' . intval($month) . '. ' . $year;
    return $formatted_date;
  }
?>