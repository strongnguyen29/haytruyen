<?php

if (!function_exists('settings'))
{
    function settings($key = null, $default = null) {
        if ($key === null) {
            return app(App\Setting::class);
        }

        return app(App\Setting::class)->get($key, $default);
    }
}