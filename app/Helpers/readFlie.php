<?php

use Illuminate\Support\Collection;

function readXml() {
    /**
     * Hàm sử dụng để đọc file extendedkeyusage.xml,
     * đây là file chứa vai của bác sỹ
     */

    $roles=simplexml_load_file('extendedkeyusage.xml') or die('Error: Không thể đọc file');

    return $roles;
}

function editConfigFile($value, $check)
{
    /**
     * Hàm sử dụng để cấu hình lại file opnessl.cnf
     * trong máy tính để sử dụng trường extendKeyUsage
     * ở đây mình dùng ubuntu nên file sẽ nằm trong đường dẫn /etc/ssl/openssl.cnf
     */

    $file = \File::get('/etc/ssl/openssl.cnf');
    $oids = "[ new_oids ] \n";
    $extendedKeyUsage = 'extendedKeyUsage = critical,';
    $count = 0;

    foreach (readXml() as $role) {
        if (in_array($role->oid, $value)) {
            $oids .= $role->new_oids .' = ' . $role->oid . "\n" ;
            $count++;
            if (count($value) != $count) {
                $extendedKeyUsage .= $role->new_oids . ',';
            } else {
                $extendedKeyUsage .= $role->new_oids;
            }
        }
    }
    if ($check == 1) {
        $search = ['[ new_oids ]', 'extendedKeyUsage = critical'];
        $replace = [$oids, $extendedKeyUsage];
    } else {
        $search = [$oids, $extendedKeyUsage];
        $replace = ['[ new_oids ]', 'extendedKeyUsage = critical'];
    }

    \File::put('/etc/ssl/openssl.cnf', str_replace($search, $replace, $file));
}
