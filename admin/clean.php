<?php
function clean_input($string)
{
    // Trim whitespace from the beginning and end
    $string = trim($string);

    // Remove backslashes
    $string = stripslashes($string);

    // Normalize all control characters
    $string = preg_replace('/[\x00-\x1F\x7F]/u', '', $string);

    // Ensure the input is properly encoded as UTF-8
    if (!mb_check_encoding($string, 'UTF-8')) {
        $string = mb_convert_encoding($string, 'UTF-8', 'auto');
    }

    // Convert special characters to HTML entities (prevents XSS)
    $string = htmlspecialchars($string, ENT_QUOTES, 'UTF-8');

    // Optionally, you can apply a maximum length restriction
    $maxLength = 255; // Adjust based on your needs
    if (strlen($string) > $maxLength) {
        $string = substr($string, 0, $maxLength);
    }

    return $string;
}
?>