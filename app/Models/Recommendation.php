<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Recommendation extends Model
{
    //

    protected $guarded = [];

    protected $casts = [
        'recommendation' => 'array',
    ];
}
