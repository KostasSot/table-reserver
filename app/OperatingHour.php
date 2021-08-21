<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OperatingHour extends Model
{
    protected $fillable = [
        'starting_hour','closing_hour', 'open'
    ];

    protected $casts = [
        'open' => 'boolean'
    ];
}
