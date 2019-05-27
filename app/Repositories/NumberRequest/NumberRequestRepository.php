<?php

namespace App\Repositories\NumberRequest;

use App\Repositories\BaseRepository as BaseRepository;
use Auth;

/**
 *
 */
class NumberRequestRepository extends BaseRepository implements NumberRequestRepositoryInterface
{
    public function model()
    {
        return \App\Models\NumberRequest::class;
    }

    public function markNotify($id)
    {
        foreach (Auth::user()->unreadNotifications as $notification) {
            if ($notification->data['request_id'] == $id) {
                $notification->markAsRead();
            }
        }
    }
}
