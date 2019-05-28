<?php

namespace App\Repositories\Certificate;

use App\Repositories\BaseRepository as BaseRepository;

/**
 *
 */
class CertificateRepository extends BaseRepository implements CertificateRepositoryInterface
{
    public function model()
    {
        return \App\Models\Certificate::class;
    }

    public function getDataOnlyTrashed($with = [], $data = [], $dataSelect = ['*'], $attribute = ['id', 'desc'])
    {
        return $this->model
            ->select($dataSelect)
            ->with($with)
            ->onlyTrashed()
            ->where($data)
            ->orderBy($attribute[0], $attribute[1])
            ->get();
    }

    public function getCert($user_id)
    {
        $data = [
            'user_id' => $user_id,
            'status' => 0,
            'type' => 0,
        ];
        $cert = $this->getData(['user'], $data)->first();

        return $cert;
    }

    public function getPubKey($req)
    {
        $data = [
            'user_id' => $req,
            'status' => 0,
            'type' => 0,
        ];
        $cert = $this->getData(['user'], $data)->first();
        $pub_key = openssl_pkey_get_details(openssl_pkey_get_public($cert['certificate']));

        return $pub_key;
    }
}
