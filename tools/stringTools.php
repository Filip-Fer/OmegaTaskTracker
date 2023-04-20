<?php
/**
 * Checks whether a given year is a leap year or not.
 * 
 * A leap year is a year that is exactly divisible by 4, except for years that are exactly divisible by 100. However,
 * years that are divisible by 400 are also leap years.
 *
 * @param int $year The year to check.
 * @return bool Returns true if the year is a leap year, false otherwise.
 */
function is_leap_year($year) {
    return (($year % 4 == 0 && $year % 100 != 0) || $year % 400 == 0);
}

/**
 * Replaces all occurrences of a string in another string.
 *
 * @param string $string The original string.
 * @param string $search The string to search for.
 * @param string $replace The string to replace with.
 * @return string Returns the resulting string after all occurrences of $search have been replaced with $replace.
 */
function replace_string($string, $search, $replace) {
    return str_replace($search, $replace, $string);
}

/**
 * Encrypts a string using a given key.
 *
 * @param string $string The string to encrypt.
 * @param string $key The key to use for encryption.
 * @return string Returns the encrypted string as a base64-encoded string.
 */
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

/**
 * Decrypts a string that has been encrypted using a given key.
 *
 * @param string $string The string to decrypt (in base64-encoded form).
 * @param string $key The key that was used for encryption.
 * @return string Returns the decrypted string.
 */
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

/**
 * Generates a random password of a given length.
 *
 * @param int $length The length of the password to generate.
 * @return string Returns the generated password as a string.
 */
function generate_random_password($length) {
    $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_+-=[]{}|;:,.<>?';
    $password = '';
    for ($i = 0; $i < $length; $i++) {
        $password .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $password;
}

/**
 * Validates an email address using PHP's built-in filter_var function.
 *
 * @param string $email The email address to validate.
 * @return bool Returns true if the email address is valid, false otherwise.
 */
function validate_email($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}


/**
 * Funkce pro nahrazení řetězce v textu.
 *
 * @param string $search Řetězec, který se má nahradit.
 * @param string $replace Řetězec, kterým se má nahradit.
 * @param string $text Text, ve kterém se má nahrazovat.
 * @return string Vrací text s nahrazeným řetězcem.
 */
function replaceText($search, $replace, $text) {
    return str_replace($search, $replace, $text);
}

/**
 * Funkce pro odstranění diakritiky z řetězce.
 *
 * @param string $text Text, ze kterého se má odstranit diakritika.
 * @return string Vrací text bez diakritiky.
 */
function removeDiacritics($text) {
    $table = array(
        'Á'=>'A','Č'=>'C','Ď'=>'D','É'=>'E','Ě'=>'E','Í'=>'I','Ň'=>'N','Ó'=>'O','Ř'=>'R','Š'=>'S','Ť'=>'T','Ú'=>'U','Ů'=>'U','Ý'=>'Y','Ž'=>'Z',
        'á'=>'a','č'=>'c','ď'=>'d','é'=>'e','ě'=>'e','í'=>'i','ň'=>'n','ó'=>'o','ř'=>'r','š'=>'s','ť'=>'t','ú'=>'u','ů'=>'u','ý'=>'y','ž'=>'z'
    );
    return strtr($text, $table);
}

/**
 * Funkce pro převod řetězce na slug.
 *
 * @param string $text Text, který se má převést na slug.
 * @return string Vrací slug vytvořený z textu.
 */
function textToSlug($text) {
    $text = removeDiacritics($text);
    $text = strtolower($text);
    $text = preg_replace('/[^a-z0-9]+/', '-', $text);
    $text = trim($text, '-');
    return $text;
}

?>