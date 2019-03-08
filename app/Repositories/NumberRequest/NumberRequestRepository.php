<?php

namespace App\Repositories\NumberRequest;

use App\Repositories\BaseRepository as BaseRepository;

/**
 * 
 */
class NumberRequestRepository extends BaseRepository implements NumberRequestRepositoryInterface
{
    public function model()
    {
        return \App\Models\NumberRequest::class;
    }
}
