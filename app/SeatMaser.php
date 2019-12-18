<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SeatMaser extends Model
{
    protected $table = 'seat_masers';

    protected $fillable = [
        'name',
        'row_number',
        'status'
    ];
    public function ShowBookingSeat(){
        return $this->hasMany('App\ShowBookingSeat','seat_maser_id','id');
    }
}
