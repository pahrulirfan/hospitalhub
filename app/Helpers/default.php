<?php

use Illuminate\Support\Facades\Route;

if (! function_exists('set_active')) {
    function set_active($route, $output = 'active')
    {
        if (is_array($route)) {
            return in_array(Route::currentRouteName(), $route) ? $output : '';
        }

        return Route::currentRouteName() === $route ? $output : '';
    }
}

if (!function_exists('alert')) {
    function alert($type = 'success', $message = '')
    {
        session()->flash($type, $message);
    }
}
