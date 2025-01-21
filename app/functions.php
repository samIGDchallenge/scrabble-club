<?php

if (!function_exists('is_current_route')) {
    function is_current_route(string $name): bool {
        return Route::currentRouteName() === $name;
    }
}
