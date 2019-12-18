<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShowTime extends Model
{
    protected $table = 'show_times';

    protected $fillable = [
        'show_time',
        'display_show_time',
        'status'
    ];

}
