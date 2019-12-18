



@extends('layout.layout')


@section('content')




        <!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div>
                                {{$movie->name}} &nbsp;  &nbsp; {{$show_time->display_show_time}} &nbsp;  &nbsp; {{ date("d/M/y", strtotime($show_date))}}
                            </div>
                            <div class="col-12 col-md-3 col-sm-6 mb-4 mb-md-0 border-right-md d-flex justify-content-between justify-content-md-center">
                                <div class="wrapper d-flex align-items-center justify-content-center">
                                    <div class="btn social-btn btn-twitter btn-rounded d-inline-block"><i class="mdi mdi-record"></i></div>
                                    <div class="wrapper d-flex flex-column ml-4">
                                        <p class="font-weight-bold mb-2">Total Seat</p>
                                        <p class="mb-0 text-muted">{{$total_seat}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-3 col-sm-6 mb-4 mb-md-0 border-right-md d-flex justify-content-between justify-content-md-center">
                                <div class="wrapper d-flex align-items-center justify-content-center">
                                    <div class="btn social-btn btn-facebook btn-rounded d-inline-block"><i class="mdi mdi-record"></i></div>
                                    <div class="wrapper d-flex flex-column ml-4">
                                        <p class="font-weight-bold mb-2">Booked</p>
                                        <p class="mb-0 text-muted">{{$show_booked}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-3 col-sm-6 mb-4 mb-md-0 border-right-md d-flex justify-content-between justify-content-md-center">
                                <div class="wrapper d-flex align-items-center justify-content-center">
                                    <div class="btn social-btn btn-google btn-rounded d-inline-block"><i class="mdi mdi-record"></i></div>
                                    <div class="wrapper d-flex flex-column ml-4">
                                        <p class="font-weight-bold mb-2">Left</p>
                                        <p class="mb-0 text-muted">{{$balance}}</p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Booked Tickets</h4>
                <div class="row">
                    <div class="col-12">
                        <table id="order-listing" class="table">
                            <tbody>
                            <tr>
                                <th>Sl no.</th>
                                <th>Customer Details</th>
                                <th>Seats Name</th>
                                <th>Total Seat Count</th>
                                <th>Total Amount</th>



                            </tr>
                            </tbody>
                            <tbody>
                            @foreach($ShowBookings as $key =>$booking)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$booking->User->name}},
                                        {{$booking->User->email}}<br>
                                        {{$booking->User->mobile}}<br>
                                    </td>
                                    <td>
                                        @foreach($booking->ShowBookingSeat as $showBookingSeat)
                                            {{$showBookingSeat->SeatMaser->name}},
                                        @endforeach
                                    </td>

                                    <td>{{$booking->seat_count}}</td>
                                    <td>{{$movie->price *$booking->seat_count}}</td>




                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
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