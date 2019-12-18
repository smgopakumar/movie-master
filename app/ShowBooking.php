<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShowBooking extends Model
{
    protected $table = 'show_bookings';

    protected $fillable = [
        'user_id',
        'movie_id',
        'show_time_id',
        'show_date',
        'seat_count',
        'status'
    ];


    public function User(){
        return $this->belongsTo('App\User');
    }
    public function ShowTime(){
        return $this->belongsTo('App\ShowTime');
    }
    public function Movie(){
        return $this->belongsTo('App\Movie');
    }
    public function ShowBookingSeat(){
        return $this->hasMany('App\ShowBookingSeat','show_booking_id','id');
    }


}
