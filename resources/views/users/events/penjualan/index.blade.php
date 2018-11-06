@extends('layouts.master')

@section('title')
EVENT
@endsection
@section('nama_user')
budi
@endsection
@section('nama_halaman')
LAPORAN PENJUALAN
@endsection

@section('side_navigation')
  @include('layouts.sidebar_event')
@endsection


{{-- @section('side_navigation')
  @extends('layouts.navigation')
  @extends('layouts.navigation_event')
@endsection --}}
@section('nama_acara')
  {{ $acara->nama }}
@endsection
@section('content')
<div class="w3-container w3-padding-32">
  <!--Search Bar-->
  <div class="w3-bottombar w3-border-teal w3-text-teal">
    <b><h2> {{ $acara->nama }} </h2></b>
  </div>


  <div class="w3-container city" >
      <!--Awal Tabel-->
      <p>
      <div class="w3-responsive">
        <table class="w3-table-all">
          <tr>
            <th>Nama Tiket</th>
            <th>Harga</th>
            <th>Tiket Terjual</th>
            <th>Total Penjualan</th>
          </tr>
          @foreach ($produks as $p)
            <tr>
              <td>{{ $p->nama }}</td>
              <td>{{ $p->harga }}</td>
              {{-- <td>{{ $p->ispaid }}</td>
              <td>{{ $p->link->user->name }}</td>
              <td> <a href="#" class="w3-btn w3-teal">Lihat</a> </td> --}}
            </tr>
          @endforeach
        </table>
      </div>
      </p>
  </div>




  </div>
  <!--Akhir Container-->




@endsection
