
@extends('layout.layout')

@section('css')
       <style>
           .bookedSeat{
               cursor: pointer;
               color:#f90000;
           }
           .bookedSeatIcon{
               cursor: pointer;
               color:#f90000;
           }
           .notBookedSeat{
               cursor: pointer;
               color:#1094f7;
           }
           .notBookedSeatIcon{
               cursor: pointer;
               color:#1094f7;
           }
       </style>

@endsection

@section('content')



        <!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Book Seat For <span style="color: red;">{{$movie->name}} </span>
                            at <span style="color: red;"> {{$timings->display_show_time}} </span>
                            On <span style="color: red;">{{ date("d/M/y", strtotime($show_date))}} </span>
                        </h4>
                        <span>Per Ticket : Rs {{$movie->price}} /- </span>


                        <div class="alert alert-danger" style="display:none"></div>

                        <div class="icons-list row">


                            @foreach($seat_master as $seat)

                                        <div class="col-sm-3 col-md-2 col-lg-1">
                                            @if($seat->booked_status == 1)
                                            <div class="preview" style="cursor: pointer"> <i style="color: #b3b3b3;" class="icon-folder"></i>{{$seat->name}}</div>
                                            @else
                                                <div id="{{$seat->id}}div" data-seat-no="{{$seat->id}}" data-booked-flag="0" style="cursor: pointer" onclick="seatSelection('{{$seat->id}}','{{$seat->name}}')">
                                                    <i id="{{$seat->id}}icon" class="icon-folder"></i>
                                                    {{$seat->name}}
                                                </div>
                                            @endif
                                        </div>
                            @endforeach


                        </div>

                        <br/>
                        <div class="col-sm-4 col-md-3 col-lg-2">


                            <input type="hidden" id="movie_id" value="{{$movie_id}}">
                            <input type="hidden" id="show_time_id" value="{{$show_time_id}}">
                            <input type="hidden" id="show_date" value="{{$show_date}}">
                            <input type="hidden" id="baseUrl" value="{{\Illuminate\Support\Facades\URL::to('/')}}">

                                <div class=" pull-right bg-success px-4 py-2 rounded" onclick="bookTicket()" style="cursor: pointer">
                                    <i class="mdi  text-white ">Book</i>
                                </div>
                        </div>
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
              <a href="#" target="_blank">Movie Booking</a>. All rights reserved.</span>

        </div>
    </footer>
    <!-- partial -->
</div>
<!-- main-panel ends -->

@section('js')
    <script type="application/javascript">

//        var seat_names = [];

        function seatSelection(searId,seatName){

            if($('#'+searId+'div').data('booked-flag') == 0){

                $('#'+searId+'div').addClass('bookedSeat');
                $('#'+searId+'icon').css('color', '#f90000');


                $('#'+searId+'div').data('booked-flag',1);
            }else {
                $('#'+searId+'div').removeClass('bookedSeat');
                $('#'+searId+'icon').css('color', '#1094f7');
                $('#'+searId+'div').data('booked-flag',0);
            }


//            $(".bookedSeat").each(function () {
//                alert($(this).data('seat-no'));
//            });


        }

        function bookTicket(){
//            alert('bookTicket');
            $( ".alert-danger" ).empty();
            var seat_ids = [];

            $(".bookedSeat").each(function () {
                seat_ids.push(parseInt(($(this).data('seat-no'))));
            });

           var movie_id = $('#movie_id').val();
           var show_time_id = $('#show_time_id').val();
           var show_date = $('#show_date').val();
           var baseUrl = $('#baseUrl').val();

            $.ajax({
                method: "POST",
                url: "/showBooking",
                data: {"_token": "{{ csrf_token() }}",'seat_ids':seat_ids,'movie_id':movie_id,'show_time_id':show_time_id,
                    'show_date':show_date},

                success: function (data, status, jqXHR) {

                    if(data.status == 1){

                        window.location = baseUrl+data.redirect_url;

                    }else {

                        $.each(data.validation, function(key, value){
                            $('.alert-danger').show();
                            $('.alert-danger').append('<p>'+value+'</p>');
                        });

                    }

                },
                error: function (data, status, err) {

                },});


        }

    </script>
@endsection

@endsection