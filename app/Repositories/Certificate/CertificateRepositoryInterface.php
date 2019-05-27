<?php

namespace App\Repositories\Certificate;

interface CertificateRepositoryInterface
{
    public function getDataOnlyTrashed($with = [], $data = [], $dataSelect = ['*'], $attribute = ['id', 'desc']);

    public function getCertAdmin($user_id);

    public function getPubKey($data);
}
