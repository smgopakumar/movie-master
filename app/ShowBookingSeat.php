<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShowBookingSeat extends Model
{
    protected $table = 'show_booking_seats';

    protected $fillable = [
        'show_booking_id',
        'seat_maser_id',
        'status'
    ];

    public function ShowBooking(){
        return $this->belongsTo('App\ShowBooking');
    }
    public function SeatMaser(){
        return $this->belongsTo('App\SeatMaser');
    }
}
