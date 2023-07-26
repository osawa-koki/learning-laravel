<?php

if (! function_exists('integer_prettify')) {
    function integer_prettify(?int $number): string
    {
        if (is_null($number)) {
            return '';
        }

        return number_format($number);
    }
}
