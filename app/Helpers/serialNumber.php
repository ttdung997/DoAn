<?php

function serialNumber()
{
    return mt_rand(100000000000000000, 999999999999999999);
}

function serialNumberHex($value)
{
    $str = '';
    for ($i=0; $i < strlen($value); $i+2) {
        $sub = substr($value, 0, 2);
        $str .= $sub.' ';
        $value = substr($value, 2);
    }

    return $str;
}
