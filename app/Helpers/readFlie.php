<?php

use Illuminate\Support\Collection;

function readXml() {
    $roles=simplexml_load_file('extendedkeyusage.xml') or die('Error: Không thể đọc file');

    return $roles;
}
