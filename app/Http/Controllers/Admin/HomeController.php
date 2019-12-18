<?php

namespace App\Http\Controllers\Admin;

use App\Movie;
use App\SeatMaser;
use App\ShowBooking;
use App\ShowBookingSeat;
use App\ShowTime;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data['ShowBookings'] = collect(ShowBooking::where('show_date','>=',date('Y-m-d'))
            ->select('movie_id','show_date','show_time_id')->orderBy('show_date')->get()
            ->load('Movie','ShowTime'))
            ->unique()->values()->all();

        $data['timings'] = ShowTime::select('id','display_show_time')->get();

        return view('admin.dashboard', $data);

    }

    public function getAllShowSetails($movieId,$showTimeId,$showDate){

        $data['total_seat'] = SeatMaser::count();

        $data['show_booked'] = ShowBooking::where('movie_id',$movieId)
            ->where('show_time_id',$showTimeId)
            ->where('show_date',$showDate)
            ->sum('seat_count');

        $data['balance'] = $data['total_seat'] - $data['show_booked'];

        $data['movie'] = Movie::find($movieId);
        $data['show_time'] = ShowTime::find($showTimeId);
        $data['show_date'] = $showDate;

        $data['ShowBookings'] = ShowBooking::where('movie_id',$movieId)
            ->where('show_time_id',$showTimeId)
            ->where('show_date',$showDate)
            ->get()->load('User','ShowTime','ShowBookingSeat','ShowBookingSeat.SeatMaser');

//         return $data;
        return view('admin.tickets-list', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
