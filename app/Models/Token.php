<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Token extends Model
{
    protected $fillable = [
        'name',
    ];

    public function numberRequests()
    {
        return $this->hasMany(NumberRequest::class);
    }
}
