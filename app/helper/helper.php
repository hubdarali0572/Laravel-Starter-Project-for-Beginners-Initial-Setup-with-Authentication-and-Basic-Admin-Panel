<?php
if (!function_exists('active_class')) {
    function active_class($routeNames, $class = 'active')
    {
        // Make sure $routeNames is an array
        $routeNames = (array) $routeNames;

        foreach ($routeNames as $route) {
            if (request()->routeIs($route)) {
                return $class;
            }
        }

        return '';
    }
}
