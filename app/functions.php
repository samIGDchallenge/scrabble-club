<?php

if (!function_exists('is_current_route')) {
    function is_current_route(?string $name = null): bool {
        if (Route::currentRouteName() === null) {
            return $name === null;
        }
        return Route::is($name) || Route::is($name.'.*');
    }
}
