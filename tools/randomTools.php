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

/**
 * Convert temperature from Celsius to Fahrenheit.
 *
 * @param float $celsius Temperature in Celsius.
 * @return float Converted temperature in Fahrenheit.
 */
function convert_celsius_to_fahrenheit($celsius) {
    return ($celsius * 9/5) + 32;
}

/**
 * Convert temperature from Fahrenheit to Celsius.
 *
 * @param float $fahrenheit Temperature in Fahrenheit.
 * @return float Converted temperature in Celsius.
 */
function convert_fahrenheit_to_celsius($fahrenheit) {
    return ($fahrenheit - 32) * 5/9;
}

/**
 * Calculate the area of a triangle.
 *
 * @param float $base The length of the base of the triangle.
 * @param float $height The height of the triangle.
 * @return float The area of the triangle.
 */
function calculate_triangle_area($base, $height) {
    return ($base * $height) / 2;
}

/**
 * Calculate the area of a rectangle.
 *
 * @param float $length The length of the rectangle.
 * @param float $width The width of the rectangle.
 * @return float The area of the rectangle.
 */
function calculate_rectangle_area($length, $width) {
    return $length * $width;
}

/**
 * Calculate the area of a circle.
 *
 * @param float $radius The radius of the circle.
 * @return float The area of the circle.
 */
function calculate_circle_area($radius) {
    return pi() * pow($radius, 2);
}

/**
 * Calculate the area of a square.
 *
 * @param float $side The length of one side of the square.
 * @return float The area of the square.
 */
function calculate_square_area($side) {
    return pow($side, 2);
}

function is_leap_year($year) {
    return (($year % 4 == 0 && $year % 100 != 0) || $year % 400 == 0);
}
function replace_string($string, $search, $replace) {
    return str_replace($search, $replace, $string);
    }
    
    function encrypt_string($string, $key) {
    $result = '';
    for ($i = 0; $i < strlen($string); $i++) {
    $char = substr($string, $i, 1);
    $keychar = substr($key, ($i % strlen($key)) - 1, 1);
    $char = chr(ord($char) + ord($keychar));
    $result .= $char;
    }
    return base64_encode($result);
    }
    
    function decrypt_string($string, $key) {
    $result = '';
    $string = base64_decode($string);
    for ($i = 0; $i < strlen($string); $i++) {
    $char = substr($string, $i, 1);
    $keychar = substr($key, ($i % strlen($key)) - 1, 1);
    $char = chr(ord($char) - ord($keychar));
    $result .= $char;
    }
    return $result;
    }
    
    function generate_random_password($length) {
    $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_+-=[]{}|;:,.<>?';
    $password = '';
    for ($i = 0; $i < $length; $i++) {
    $password .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $password;
    }
    
    function validate_email($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
    }
    
    function validate_url($url) {
    return filter_var($url, FILTER_VALIDATE_URL);
    }
    
    function validate_ip_address($ip_address) {
    return filter_var($ip_address, FILTER_VALIDATE_IP);
    }
    
    function get_client_ip_address() {
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    return $_SERVER['HTTP_CLIENT_IP'];
    }
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    return $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    else {
    return $_SERVER['REMOTE_ADDR'];
    }
    }
    
    function is_valid_username($username) {
    return (preg_match('/^[a-zA-Z0-9_]{3,20}$/', $username) == 1);
    }
    
    function is_valid_password($password) {
    return (preg_match('/^(?=.[a-z])(?=.[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/', $password) == 1);
    }
    
    function is_valid_credit_card_number($credit_card_number) {
    $credit_card_number = str_replace(' ', '', $credit_card_number);
    $length = strlen($credit_card_number);
    $sum = 0;
    for ($i = $length - 1; $i >= 0; $i--) {
    $digit = intval(substr($credit_card_number, $i, 1));
    if ($i % 2 == 0) {
    $digit *= 2;
    if ($digit > 9) {
    $digit -= 9;
    }
    }
    $sum += $digit;
    }
    return ($sum % 10 == 0);
    }
    
    function is_valid_phone_number($phone_number) {
    return (preg_match('/^+?[0-9]{10,14}$/', $phone_number) == 1);
    }