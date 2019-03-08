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
}
