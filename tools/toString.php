<?php

/**
 * Přemění input na string
 * 
 * @param string $input
 * @return string $result
 */
function toString($input)
  {
    if (is_string($input)) {
      $result = $input;
      return $result;
    } elseif (is_array($input)) {
      $result = implode(', ', $input);
      return $result;
    } elseif (is_object($input)) {
      $result = (string) $input; 
      return $result;
    } else {
      $result = '';
      return $result; 
    }
  }
?>