<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
//    return view('login');
//});





//************* START home Ctrl **************************
Route::get('login', 'LoginController@loginPage');
Route::get('logout', 'LoginController@logout');
Route::get('register-page', 'LoginController@registerPage');
//Route::post('register', 'LoginController@registerPage');

Route::resource('register', 'LoginController');
Route::post('user/login', 'LoginController@userLogin');
//************* END home Ctrl **************************



Route::group(['middleware'=>['public']], function() {

//************* START home Ctrl **************************
//    Route::resource('/', 'HomeController')->name('/home');
    Route::get('/', 'HomeController@index')->name('/home');
    Route::get('purchase-history', 'HomeController@bookedTicketHistory')->name('/purchase-history');
//************* END home Ctrl **************************

//************* START show Booking Mgt **************************
    Route::resource('showBooking', 'TicketBookingController');
    Route::get('show/booking/{id}', 'TicketBookingController@show')->name('/show/booking/{id}');
    Route::get('showBooking/cancel/{id}', 'TicketBookingController@cancelBooking');
    Route::get('showBooking/details/{movie_id}/{show_id}/{date}', 'TicketBookingController@getAllShowDetails');
//************* END show Booking Mgt **************************


});



Route::group(['middleware'=>['admin']], function() {

//************* START home Ctrl **************************
    Route::resource('admin-home', 'Admin\HomeController');
    Route::get('admin-home', 'Admin\HomeController@index')->name('/admin/dashboard');
    Route::get('admin/show/details/{movie_id}/{show_id}/{date}', 'Admin\HomeController@getAllShowSetails');
//************* END home Ctrl **************************

});