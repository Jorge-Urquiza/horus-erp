<?php

if (! function_exists('latam_date')) {
    function latam_date($date)
    {
        return optional($date)->format('d/m/Y - H:i:s') ?: null;
    }
}

if (! function_exists('money')) {
    function money($number = null)
    {
        return number_format($number ?: 0, 2, '.', ',');
    }
}
