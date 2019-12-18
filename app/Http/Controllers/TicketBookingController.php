<?php

namespace App\Http\Controllers;

use App\Movie;
use App\SeatMaser;
use App\ShowBooking;
use App\ShowBookingSeat;
use App\ShowTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class TicketBookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = ShowBooking::where('user_id',Auth::user()->id)->get();
        if(sizeof($data)>=1){
            $data->load('User','ShowTime','Movie','ShowBookingSeat');
        }

        return view('show-booking-list', $data);

    }

    public function getAllShowDetails($movieId,$showTimeId,$showDate){


        $data['movie_id'] = $movieId;
        $data['show_time_id'] = $showTimeId;
        $data['show_date'] = $showDate;

        $data['movie'] = Movie::find($movieId);
        $data['timings'] = ShowTime::find($showTimeId);

        $data['seat_master'] = SeatMaser::all();

//        $data['booked_seats']=ShowBookingSeat::whereHas('ShowBooking', function ($query) use ($movieId,$showTimeId,$showDate) {
//            $query->where('movie_id',$movieId);
//            $query->where('show_time_id',$showTimeId);
//            $query->where('show_date',$showDate);
//        }) ->with('SeatMaser')->get()->load('ShowBooking');


        $booked_seats=ShowBookingSeat::whereHas('ShowBooking', function ($query) use ($movieId,$showTimeId,$showDate) {
            $query->where('movie_id',$movieId);
            $query->where('show_time_id',$showTimeId);
            $query->where('show_date',$showDate);
        })->with('SeatMaser')->get();


        foreach($data['seat_master'] as $seat_master){
            $seat_master['booked_status'] = 0;

            foreach($booked_seats as $bookedSeat){

                if($seat_master->id == $bookedSeat->seat_maser_id){
                    $seat_master['booked_status'] = 1;
                }

            }
        }

        return view('public.booking', $data);
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
//      return $request->all();
        $rules = array(
            'seat_ids' => 'required',
            'movie_id' => 'required',
            'show_time_id' => 'required',
            'show_date' => 'required|date',
        );
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {

            $data['validation'] = $validator->messages();
            $data['status'] = 0;
            return $data;

        } else {

//            $seatIds = explode(',',ltrim($request->seat_ids,","));


            if(sizeof($request->seat_ids)>=1){

                $input = $request->all();
                $input['seat_count'] = sizeof($request->seat_ids);
//                unset($input['seat_ids']);
                $input['user_id'] = Auth::user()->id;
                $ShowBooking = ShowBooking::create($input);

                $input1['show_booking_id'] = $ShowBooking->id;
                foreach($request->seat_ids as  $id){
                    $input1['seat_maser_id'] = $id;
                    $create = ShowBookingSeat::create($input1);
                }

                if ($ShowBooking) {
//                    return redirect()->route('show/booking', ['id' => $ShowBooking->id]);

                    $data['redirect_url'] = '/show/booking/'.$ShowBooking->id;
                    $data['status'] = 1;
                    return $data;

                } else {
                    return response(['message' => 'Electoral Roll not updated. Try again!!', 'data' => ''], 401);
                }
            }else{
                return response(['message' => 'Please select seat.!!', 'data' => ''], 401);
            }


        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['booking'] = ShowBooking::find($id);
        $data['booking']->load('User','ShowTime','Movie','ShowBookingSeat','ShowBookingSeat.SeatMaser');
        return view('public.show-booking-ticket', $data);
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

    }

    public function cancelBooking($id){

        $data = ShowBooking::find($id);

        if(sizeof($data)>=1){
            ShowBooking::where('id',$id)->update(['status'=>0]);
            $data['message'] = 'Successfully canceled';
            $data['status'] = 1;
        }else{
            $data['message'] = 'No data found';
            $data['status'] = 0;
        }

    }
}
