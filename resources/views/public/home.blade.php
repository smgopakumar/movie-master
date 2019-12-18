
@extends('layout.layout')


@section('content')


        <!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">

            @for($i =0;$i<$number_of_days;$i++)
                <?php $date = date('Y-m-d', strtotime($i.' day', strtotime(date('Y-m-d')))); ?>
                @foreach($movies as $movie)
                    <div class="col-md-4 grid-margin stretch-card">
                        <div class="card text-black">
                            <img src="{{URL::asset($movie->image_url)}}" style="height: 220px;">
                            <div  class="card-body">
                                <h2 class="card-title">{{$movie->name}}</h2>
                                <div class="row mt-5">
                                    <div class="col-6">
                                        <div class="wrapper">
                                            <h5 class="mb-1" style="color:blue">SHOW Date :: {{ date("d/M/y", strtotime($date))}}</h5>
                                            <h5 class="mb-1" style="color:blue">SHOW TIME </h5>


                                            @foreach($show_times as $show_time)

                                                @if(date('Y-m-d') == $date)
                                                    <?php $flag = 1; $currentTime = date('H-m-s'); ?>
                                                @if($currentTime < $show_time->show_time)

                                            <h4 class="mb-1">
{{--                                                @if($currentTime)--}}
                                                <a href="{{ url('/showBooking/details/'.$movie->id.'/'.$show_time->id.'/'.$date) }}">
                                                    <strong>{{$show_time->display_show_time}}</strong>
                                                </a>
                                            </h4>
                                                @endif
                                                @else
                                                    <h4 class="mb-1">
                                                        {{--                                                @if($currentTime)--}}
                                                        <a href="{{ url('/showBooking/details/'.$movie->id.'/'.$show_time->id.'/'.$date) }}">
                                                            <strong>{{$show_time->display_show_time}}</strong>
                                                        </a>
                                                    </h4>
                                                @endif
                                         @endforeach

                                        </div>

                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                @endforeach

            @endfor

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