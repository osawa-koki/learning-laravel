<?php

if (!function_exists('number_prettify')) {
    function number_prettify(?int $number): string
    {
        if (is_null($number)) return '';
        return number_format($number);
    }
}
?>
