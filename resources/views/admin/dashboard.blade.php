
@extends('layout.layout')


@section('content')


        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="row">

                    @foreach($ShowBookings as $booking)
                    <div class="col-md-4 grid-margin stretch-card">
                        {{--<div style="background-image:url('{{URL::asset($booking->movie->image_url)}}');height: 250px" class="card text-black">--}}
                        <div  class="card text-black">
                            <img src="{{URL::asset($booking->Movie->image_url)}}" style="height: 220px;">
                            <div  class="card-body">
                                <h4 class="card-title">{{$booking->Movie->name}}</h4>
                                <div class="row mt-5">
                                    <div class="col-6">
                                            {{--<h6 class="mb-1" style="color:blue">SHOW</h6>--}}
                                            <h4 class="mb-1">
                                                <a href="{{ url('/admin/show/details/'.$booking->movie_id.'/'.$booking->show_time_id.'/'.$booking->show_date) }}">
                                                    <strong> {{ date("d/M/y", strtotime($booking->show_date))}} &nbsp; &nbsp; {{$booking->ShowTime->display_show_time}} </strong>
                                                </a>
                                            </h4>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                    @endforeach


                </div>

            </div>
            <!-- content-wrapper ends -->
            <!-- partial:partials/_footer.html -->
            <footer class="footer">
                <div class="container-fluid clearfix">
            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © 2018
              <a href="home.html" target="_blank">Movie Booking</a>. All rights reserved.</span>

                </div>
            </footer>
            <!-- partial -->
        </div>
        <!-- main-panel ends -->




    @section('js') @endsection

@endsection