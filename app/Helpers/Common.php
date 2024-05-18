<?php

// get current route name
if (!function_exists('current_route')) {
    function current_route()
    {
        return \Request::route()->getName();
    }
}

