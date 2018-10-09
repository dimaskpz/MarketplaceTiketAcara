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
  <h3>Event</h3>
  <p>
  <div class="w3-row-padding">
    <div class="w3-half">
    <input type="text" class="w3-bar-item w3-input" placeholder="Cari Event....">
    </div>
  </div>
  </p>
    <!--Tabs-->
    <p>
    <div class="w3-row">
      <a href="javascript:void(0)" onclick="openEvent(event, 'tabaktif');">
        <div class="w3-third tablink w3-bottombar w3-hover-light-grey w3-padding">EVENT AKTIF</div>
      </a>
      <a href="javascript:void(0)" onclick="openEvent(event, 'tablalu');">
        <div class="w3-third tablink w3-bottombar w3-hover-light-grey w3-padding">EVENT LALU</div>
      </a>
    </div>
    </p>

    <div id="tabaktif" class="w3-container city" style="display:none">
      <h2>London</h2>
      <p>London is the capital city of England.</p>
    </div>

    <div id="tablalu" class="w3-container city" style="display:none">
      <h2>Paris</h2>
      <p>Paris is the capital of France.</p>
    </div>
    <!--Akhir Tabs-->
  </div>



  <script>
  function openEvent(evt, cityName) {
    var i, x, tablinks;
    x = document.getElementsByClassName("city");
    for (i = 0; i < x.length; i++) {
       x[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablink");
    for (i = 0; i < x.length; i++) {
       tablinks[i].className = tablinks[i].className.replace(" w3-border-red", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.firstElementChild.className += " w3-border-red";
  }
  </script>


@endsection
