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




Route::group(['prefix' => 'dashboards'], function () {
Route::get('/', 'DashboardController@index')->name('Dashboard_Default');
});

Route::group(['prefix' => 'tickets'], function () {
Route::get('/', 'TicketController@index')->name('Ticket_Default');
Route::get('/show/{id}', 'TicketController@show')->name('Ticket.Show');

});

Route::group(['prefix' => 'events'], function () {
Route::get('/', 'EventController@index')->name('Event_Default');
Route::get('/show/{id}', 'EventController@show')->name('Event.Show');
Route::get('/edit/{id}', 'EventController@edit')->name('Event.Edit');
Route::get('/create', 'EventController@create')->name('Event.Create');

});

Route::group(['prefix' => 'affiliates'], function () {
Route::get('/', 'AffiliateController@index')->name('Affiliate_Default');
Route::get('/show/{id}', 'AffiliateController@show')->name('Affiliate.Show');
});











Route::get('/admin', function () {
    return view('unused.cthtemplate.index');
});

Route::get('/admin2', function () {
    return view('unused.cthtemplate.index2');
});

//template dashboard
Route::get('/a2', function () {
    return view('sistem.index2');
});
//halaman welcome
Route::get('/a', function () {
    return view('sistem.index');
});

// Route::get('/karyawan', 'MasterKaryawanController@index')->name('User_Default');
