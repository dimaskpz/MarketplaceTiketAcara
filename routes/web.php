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
})->name('Welcome');

// Route::get('/','HomeController@halaman_awal')->name('Halaman.Awal.Error');

//PUBLIC
//1 TAMPILAN AWAL -> INPUT JUMLAH TIKET YANG AKAN DIBELI
Route::get('/event/{link}','PublicEventController@show')->name('Public.Event.Show');
//2 TAMPILAN INPUT DATA -> INPUT DATA PEMBELI DAN DATA PESERTA
Route::post('/event/personal','PublicEventController@personal')->name('Public.Event.Personal');
//2 STORE DATA -> INFORMASI REKENING PERUSAHAAN UNTUK PEMBAYARAN
Route::post('/event/personal/store','PublicEventController@store_personal')->name('Event.Public.Store.Personal');
//3 TAMPILAN DTRANSAKSI
Route::get('/event/trans/{no_nota}','PublicEventController@show_trans')->name('Public.Event.Trans');
//3 STORE upload bukti pembayaran
Route::post('/event/bukti/store','PublicEventController@upload')->name('Public.Upload');

Route::post('event/eticket/{transaksi_id}','PublicEventController@show_ticket')->name('Public.Eticket');


Route::post('/event/cek/nota','PublicEventController@cektrans')->name('Public.Trans.Cek');


Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
//PROFILE
Route::group(['prefix' => 'profile'], function () {
Route::get('/', 'ProfileController@edit')->name('Profile.Edit');
Route::post('/store', 'ProfileController@update')->name('Profile.Update');

});
//HOME
Route::group(['prefix' => 'home'], function () {
Route::get('/', 'HomeController@index')->name('Home_Default');
Route::get('/show/{acara_id}', 'HomeController@show')->name('Home.Event.Show');
Route::get('/show/{acara_id}/regis', 'HomeController@Sales_regis')->name('Home.Sales.Regis');
});

//DASHBOARD
// Route::group(['prefix' => 'dashboards'], function () {
// Route::get('/', 'DashboardController@index')->name('Dashboard_Default');
// });

//TICKETS
Route::group(['prefix' => 'tickets'], function () {
Route::get('/', 'TicketController@index')->name('Ticket_Default');
Route::get('/show/{id}', 'TicketController@show')->name('Ticket.Show');
});

//EVENTS
Route::group(['prefix' => 'events'], function () {
          //create EVENT
Route::get('/', 'EventController@index')->name('Event_Default');
Route::get('/show/{id}', 'EventController@show')->name('Event.Show');
Route::get('/edit/{id}', 'EventController@edit')->name('Event.Edit');
Route::get('/create', 'EventController@create')->name('Event.Create');
Route::post('/store', 'EventController@store')->name('Event.Store');
Route::put('/update/{id}', 'EventController@update')->name('Event.Update');
          //laporan penjualan EVENT
Route::get('/penjualan/{id}', 'EventController@penjualan')->name('Event.Penjualan');
          //SALES
Route::get('/sales/{id}','EventController@sales')->name('Event.Sales');
Route::post('/sales/show/{user_id}', 'EventController@sales_show')->name('Event.Komisi.Show');
Route::post('/show/detail/{transaksi_id}', 'EventController@sales_show_detail')->name('Event.Komisi.Show.Detail');

          //CHECKIN
Route::get('/checkin/{id}', 'EventController@checkin')->name('Event.Checkin');
Route::put('/checkin/tiket/{tiket_id}','EventController@checkin_update')->name('Event.Checkin.Update');

Route::get('/pemesan/{id}', 'EventController@pemesan')->name('Event.Pemesan');
Route::get('/pemesan/show/{transaksi_id}','EventController@pemesan_show')->name('Event.Pemesan.Show');
Route::get('/pemesan/show/konfirmasi/{transaksi_id}','EventController@konfirmasi')->name('Event.Ticket.Konfirmasi');

          //EVENT->tiket
Route::get('/{id}/ticket/create','EventTicketController@create')->name('Event.Ticket.Create');
Route::get('/{id}/ticket/edit', 'EventTicketController@edit')->name('Event.Ticket.Edit');
Route::post('/{id}/ticket', 'EventTicketController@store')->name('Event.Ticket.Store');
Route::get('/ticket/edit/{id}','EventTicketController@edit')->name('Event.Ticket.Edit');
Route::put('/ticket/update/{id}', 'EventTicketController@update')->name('Event.Ticket.Update');
Route::post('ticket/destroy','EventTicketController@destroy')->name('Event.Ticket.Destroy');
});

//AFFILIATES
Route::group(['prefix' => 'affiliates'], function () {
Route::get('/', 'AffiliateController@index')->name('Affiliate_Default');
Route::get('/show/{acara_id}', 'AffiliateController@show')->name('Affiliate.Show');
Route::get('/show/detail/{transaksi_id}', 'AffiliateController@show_detail')->name('Affiliate.Show.Detail');
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
