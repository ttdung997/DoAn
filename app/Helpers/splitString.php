<?php

function splitCountry($value)
{
    $address = explode(' ', $value);
    $country = '';
    foreach ($address as $add) {
        $country .= $add[0];
    }

    return $country;
}
