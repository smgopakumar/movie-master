<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $table = 'movies';

    protected $fillable = [
        'name',
        'from_date',
        'to_date',
        'image_url',
        'price',
        'status'
    ];

}
