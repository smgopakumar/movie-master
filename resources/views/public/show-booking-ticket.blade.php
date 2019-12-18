
@extends('layout.layout')

@section('css')


    @endsection

    @section('content')



<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">

            <div  class="col-md-4 grid-margin stretch-card">
                <div class="card text-black">
                    <div  class="card-body">
                        <span>Ticket Booked On : {{ date("d/M/y", strtotime($booking->created_at))}} </span> <br>   <br>
                        <img src="{{URL::asset($booking->Movie->image_url)}}" style="height: 220px;">
                        <h2 class="card-title" style="color: red;">{{$booking->Movie->name}}</h2>

                        <div class="row mt-5">
                            <div class="col-6">

                                    <h5 class="mb-1" >Show Date & Time</h5>
                                    <strong style="color: green;font-weight: 800;"> {{ date("d/M/y", strtotime($booking->show_date))}} &nbsp; &nbsp; {{$booking->ShowTime->display_show_time}} </strong>
                            </div>
                            <div class="col-6">
                                    <h5 class="mb-1" style="color:red">SEAT NUMBER : </h5>
                                        @foreach($booking->ShowBookingSeat as $seat)
                                                <span style="color: green;font-weight: 800;">{{$seat->SeatMaser->name}}</span>
                                      @endforeach

                                </div>

                            </div>
                        <div class="row mt-5">
                            Total Amount : Rs {{$booking->Movie->price * $booking->seat_count}} /-
                            <br>
                            <br>
                           <span >Note: Ticket fair paid at theater ticket counter</span>
                        </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>


@section('js')

@endsection

@endsection