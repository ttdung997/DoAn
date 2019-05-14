<?php

use Illuminate\Support\Collection;

function readXml() {
    $roles=simplexml_load_file('extendedkeyusage.xml') or die('Error: Không thể đọc file');

    return $roles;
}

function editConfigFile($value, $check)
{
    $file = \File::get('/etc/ssl/openssl.cnf');
    $oids = '';
    $extendedKeyUsage = 'extendedKeyUsage = ';
    $count = 0;

    foreach (readXml() as $role) {
        if (in_array($role->oid, $value)) {
            $count++;
            if (count($value) != $count) {
                $oids .= $role->new_oids .' = ' . $role->oid . "\n" ;
                $extendedKeyUsage .= $role->new_oids . ',';
            } else {
                $oids .= $role->new_oids .' = ' . $role->oid;
                $extendedKeyUsage .= $role->new_oids;
            }
        }
    }
    if ($check == 1) {
        $search = ['extendedkeyusageOid32 = 1.2.3.4.5.6.2', 'extendedKeyUsage = extendedkeyusageOid32'];
        $replace = [$oids, $extendedKeyUsage];
    } else {
        $search = [$oids, $extendedKeyUsage];
        $replace = ['extendedkeyusageOid32 = 1.2.3.4.5.6.2', 'extendedKeyUsage = extendedkeyusageOid32'];
    }

    \File::put('/etc/ssl/openssl.cnf', str_replace($search, $replace, $file));
}
