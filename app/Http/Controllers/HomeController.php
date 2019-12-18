<?php

namespace App\Http\Controllers;

use App\Movie;
use App\ShowBooking;
use App\ShowTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['today'] = date('Y-m-d');
        $data['yesterday'] = date('Y-m-d', strtotime('0 day', strtotime(date('Y-m-d'))));
        $data['number_of_days'] = 5;

        $data['movies'] = Movie::where('from_date','<=',date('Y-m-d'))
            ->where('to_date','>=',date('Y-m-d'))->whereStatus(1)
            ->get();
        $data['show_times'] = ShowTime::all();
//return $data;
        return view('public.home', $data);

    }

    public function bookedTicketHistory()
    {

        $data['bookings'] = ShowBooking::where('user_id',Auth::user()->id)->get();;
        $data['bookings']->load('User','ShowTime','Movie','ShowBookingSeat','ShowBookingSeat.SeatMaser');

        return view('public.booked-history', $data);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

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
