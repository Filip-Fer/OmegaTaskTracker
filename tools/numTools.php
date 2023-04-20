<?php
/**
 * Tento soubor obsahuje funkce pro matematické výpočty a manipulaci s řetězci.
 */

/**
 * Sečte dvě čísla.
 *
 * @param int|float $a První sčítanec.
 * @param int|float $b Druhý sčítanec.
 * @return int|float Součet dvou čísel.
 */
function add($a, $b) {
    return $a + $b;
}

/**
 * Odpočte dvě čísla.
 *
 * @param int|float $a Menšenec.
 * @param int|float $b Menšitel.
 * @return int|float Rozdíl dvou čísel.
 */
function subtract($a, $b) {
    return $a - $b;
}

/**
 * Vynásobí dvě čísla.
 *
 * @param int|float $a První činitel.
 * @param int|float $b Druhý činitel.
 * @return int|float Součin dvou čísel.
 */
function multiply($a, $b) {
    return $a * $b;
}

/**
 * Vydělí dvě čísla.
 *
 * @param int|float $a Dělenec.
 * @param int|float $b Dělitel.
 * @return int|float Podíl dvou čísel.
 */
function divide($a, $b) {
    return $a / $b;
}

/**
 * Spočte zbytek po dělení dvou čísel.
 *
 * @param int $a Dělenec.
 * @param int $b Dělitel.
 * @return int Zbytek po dělení dvou čísel.
 */
function modulo($a, $b) {
    return $a % $b;
}

/**
 * Umocní základ na exponent.
 *
 * @param int|float $a Základ.
 * @param int|float $b Exponent.
 * @return int|float Výsledek umocňování.
 */
function power($a, $b) {
    return pow($a, $b);
}

/**
 * Vygeneruje náhodné číslo.
 *
 * @return int Náhodné celé číslo.
 */
function get_random_number() {
    return rand();
}

/**
 * Vrátí aktuální datum a čas.
 *
 * @return string Řetězec s aktuálním datem a časem ve formátu "YYYY-MM-DD HH:MM:SS".
 */
function get_current_date() {
    return date('Y-m-d H:i:s');
}

/**
 * Zkontroluje, zda je číslo sudé.
 *
 * @param int $number Kontrolované číslo.
 * @return bool True, pokud je číslo sudé. Jinak false.
 */
function is_even($number) {
    return ($number % 2 == 0);
}

/**
 * Checks if the given number is odd.
 *
 * @param int $number The number to check.
 * @return bool True if the number is odd, false otherwise.
 */
function is_odd($number) {
    return ($number % 2 != 0);
}

/**
 * Checks if the given number is positive.
 *
 * @param int|float $number The number to check.
 * @return bool True if the number is positive, false otherwise.
 */
function is_positive($number) {
    return ($number > 0);
}

/**
 * Checks if the given number is negative.
 *
 * @param int|float $number The number to check.
 * @return bool True if the number is negative, false otherwise.
 */
function is_negative($number) {
    return ($number < 0);
}

/**
 * Counts the number of words in the given string.
 *
 * @param string $string The string to count the words in.
 * @return int The number of words in the string.
 */
function count_words($string) {
    return str_word_count($string);
}

/**
 * Counts the number of characters in the given string.
 *
 * @param string $string The string to count the characters in.
 * @return int The number of characters in the string.
 */
function count_characters($string) {
    return strlen($string);
}

/**
 * Reverses the order of characters in the given string.
 *
 * @param string $string The string to reverse.
 * @return string The reversed string.
 */
function reverse_string($string) {
    return strrev($string);
}

/**
 * Checks if the given string is a palindrome (reads the same backwards as forwards).
 *
 * @param string $string The string to check.
 * @return bool True if the string is a palindrome, false otherwise.
 */
function check_palindrome($string) {
    return ($string == strrev($string));
}

/**
 * Checks if the given character is a vowel.
 *
 * @param string $character The character to check.
 * @return bool True if the character is a vowel, false otherwise.
 */
function is_vowel($character) {
    return (preg_match('/^[aeiou]$/i', $character) == 1);
}

/**
 * Checks if a given character is a consonant.
 *
 * @param string $character The character to check.
 *
 * @return bool Returns true if the character is a consonant, false otherwise.
 */
function is_consonant($character) {
    return (preg_match('/^[bcdfghjklmnpqrstvwxyz]$/i', $character) == 1);
}

/**
 * Generates a random string of a specified length.
 *
 * @param int $length The length of the random string to generate.
 *
 * @return string Returns a random string of the specified length.
 */
function generate_random_string($length) {
    $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    $string = '';
    for ($i = 0; $i < $length; $i++) {
        $string .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $string;
}

/**
 * Calculates the factorial of a given number.
 *
 * @param int $number The number to calculate the factorial of.
 *
 * @return int Returns the factorial of the given number.
 *             If the given number is negative, returns -1.
 */
function calculate_factorial($number) {
    if ($number < 0) {
        return -1;
    }
    if ($number == 0) {
        return 1;
    }
    return $number * calculate_factorial($number - 1);
}

/**
 * Checks if a given number is a prime number.
 *
 * @param int $number The number to check.
 *
 * @return bool Returns true if the given number is a prime number, false otherwise.
 *              If the given number is less than 2, returns false.
 */
function is_prime($number) {
    if ($number < 2) {
        return false;
    }
    for ($i = 2; $i <= sqrt($number); $i++) {
        if ($number % $i == 0) {
            return false;
        }
    }
    return true;
}
?>