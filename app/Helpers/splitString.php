<?php

function splitCountry($value)
{
    $pattern = '/\s/';
    if (preg_match($pattern, $value)) {
        $address = explode(' ', $value);
        $country = '';
        foreach ($address as $add) {
            $country .= $add[0];
        }
        if (strlen($country) > 2) {
            $country = substr($country, 0, 2);
        }
    } else {
        $country = substr($value, 0, 2);
    }

    return strtoupper($country);
}
