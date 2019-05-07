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
}
