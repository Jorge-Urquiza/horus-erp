<?php

if (! function_exists('money')) {
    function money($number = null)
    {
        return number_format($number ?: 0, 2, ',', '.');
    }
}


if (! function_exists('sales_number')) {
    function sales_number($id)
    {
        $length = strlen((string) $id);

        return $length < 6 ? prefix_number($length) . $id : $id;
    }
}

if (! function_exists('prefix_number')) {
    function prefix_number($length)
    {
        switch($length){
            case 1:
                return '00000';
            case 2:
                return '0000';
            case 3:
                return '000';
            case 4:
                return '00';
            case 5:
                return '0';
        }
    }
}
