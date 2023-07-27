<?php

if (! function_exists('add_query_params')) {
    function add_query_params($params): string
    {
        $currentParams = request()->query();
        $newParams = array_merge($currentParams, $params);

        return '?'.http_build_query($newParams);
    }
}
