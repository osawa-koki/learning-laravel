<?php

if (! function_exists('float_prettify')) {
    function float_prettify(?float $number): string
    {
        if (is_null($number)) {
            return '';
        }

        return number_format($number, 2);
    }
}
