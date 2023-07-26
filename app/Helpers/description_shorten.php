<?php
if (!function_exists('description_shorten')) {
    function description_shorten(?string $description): string
    {
        return mb_strimwidth($description, 0, 20, '...');
    }
}
?>
