@extends('layouts.master')

@section('title')
EVENT
@endsection
@section('nama_user')
budi
@endsection
@section('nama_halaman')
Event
@endsection


@section('content')
<div class="w3-container w3-padding-32">
  <!--Search Bar-->
  <div class="w3-bottombar w3-border-red">
    <h3>Judul Event (OVO Talkshow)</h3>
  </div>
  <p>
  <div class="w3-row-padding">
    <div class="w3-half">
      <p>
      <div class="w3-card-4 w3-red" style="width:75%">
        <img src="/images/DWP.jpg" alt="Image 3" style="width:100%">
        <div class="w3-container w3-center">
          <p>Ovo Talkshow "DWP"</p>
        </div>
      </div>
      </p>
    </div>
  </div>
  </p>

  <div class='w3-row-padding'>
    <div class="w3-card-4 w3-white w3-topbar w3-border-red">
      <div class="w3-container">
        <div class='w3-row-padding'>
          <div class="w3-third">
            <p><b><label>Tanggal Mulai :</label></b></p>
            <p><b><label>Tanggal Selesai :</label></b></p>
            <p><b><label>Waktu :</label></b></p>
            <p><b><label>Lokasi :</label></b></p>
          </div>
          <div class="w3-two-third">
            <p><label>16 Januari 2018</label></p>
            <p><label>17 Januari 2018</label></p>
            <p><label>09.00 am - 12.00 pm</label></p>
            <p><label>Universitas Ciputra</label></p>
          </div>
        </div>
      </div>
    </div>
  </div>


  </div>
  <!--Akhir Container-->




@endsection
