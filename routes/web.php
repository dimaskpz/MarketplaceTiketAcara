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
Route::get('/cia', function () {
    return view('unused.cthtemplate.index2');
});

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');



Route::get('/dashboards', 'DashboardController@index')->name('Dashboard_Default');

Route::get('/tickets', 'TicketController@index')->name('Ticket_Default');

Route::get('/events', 'EventController@index')->name('Event_Default');

Route::get('/affiliates', 'AffiliateController@index')->name('Affiliate_Default');





Route::get('/admin', function () {
    return view('sistem.cthtemplate.index');
});

Route::get('/admin2', function () {
    return view('sistem.cthtemplate.index2');
});

// Route::get('/karyawan', 'MasterKaryawanController@index')->name('User_Default');
