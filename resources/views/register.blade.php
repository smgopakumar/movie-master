<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Movie Booking</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{asset('vendors/iconfonts/mdi/css/materialdesignicons.min.css')}}" type='text/css' />
    <link rel="stylesheet" href="{{asset('vendors/iconfonts/puse-icons-feather/feather.css')}}" type='text/css' />
    <link rel="stylesheet" href="{{asset('vendors/css/vendor.bundle.base.css')}}" type='text/css' />
    <link rel="stylesheet" href="{{asset('vendors/css/vendor.bundle.addons.css')}}" type='text/css' />
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{asset('css/style.css')}}" type='text/css' />
    <link rel="stylesheet" href="{{asset('css/custom.css')}}" type='text/css' />
    <!-- endinject -->
    <link rel="shortcut icon" href="{{asset('images/favicon.png')}}" type='text/css' />
</head>

<body>
<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth">
            <div class="row w-100">
                <div class="col-lg-6 mx-auto">
                    <div class="row">
                        <div class="col-lg-3 bg-white">
                        </div>

                        <div class="col-lg-6 bg-white">
                            <div class="auth-form-light text-left p-5">
                                <h2>Register</h2>
                                <form class="pt-4" method="post" action="/register" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="form-group" style="color: red">
                                        @if($errors->any())
                                            <h4>{{$errors->first()}}</h4>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputName" class="labl-crless">Name</label> <span style="color:red;">*</span>
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Name"  value="{{ old('name') }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1" class="labl-crless">Email</label>  <span style="color:red;">*</span>
                                        <input type="email" class="form-control" id="email" name="email" placeholder="Email"  value="{{ old('email') }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputName" class="labl-crless">Mobile Number</label>  <span style="color:red;">*</span>
                                        <input type="text" class="form-control" id="mobilenumber" name="mobile" placeholder="Mobile Number"  value="{{ old('mobile') }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1" class="labl-crless">Password</label>  <span style="color:red;">*</span>
                                        <input type="text" class="form-control" id="password" name="password" placeholder="Password">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputName" class="labl-crless">Confirm Password</label>  <span style="color:red;">*</span>
                                        <input type="text" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password">
                                    </div>


                                    <div class="mt-5">
                                        <input class="btn btn-block btn-success btn-lg font-weight-medium auth-form-btn" type="submit" value="Register">
                                    </div>

                                    <div class="mt-2 text-center">
                                        <a href="{{ url('/login') }}" class="auth-link text-black">Already have an account?
                                            <span class="font-weight-medium">Sign in</span>
                                        </a>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-3 bg-white">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->
<!-- plugins:js -->
<script src="{{asset('vendors/js/vendor.bundle.base.js')}}"></script>
<script src="{{asset('vendors/js/vendor.bundle.addons.js')}}"></script>
<script src="{{asset('js/off-canvas.js')}}"></script>
<script src="{{asset('js/hoverable-collapse.js')}}"></script>
<script src="{{asset('js/misc.js')}}"></script>
<script src="{{asset('js/todolist.js')}}"></script>
<script src=""></script>
<script src=""></script>
<!-- endinject -->

</body>

</html>