<?php

namespace App\Repositories\User;

use App\Repositories\BaseRepository as BaseRepository;

/**
 * 
 */
class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    public function model()
    {
        return \App\User::class;
    }
}
