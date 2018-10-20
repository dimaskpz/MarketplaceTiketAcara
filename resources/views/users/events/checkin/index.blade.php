@extends('layouts.master')

@section('title')
EVENT
@endsection
@section('nama_user')
budi
@endsection
@section('nama_halaman')
CHECKIN
@endsection

@section('side_navigation')
  {{-- @extends('layouts.navigation') --}}
  {{-- @extends('layouts.navigation_event') --}}
  <a class="w3-bar-item w3-padding"></a>
  <p></p>
  <h9>    Event Dashboard</h9>
  <a href="{{ route('Event.Show', ['id' => $acara->id]) }}" class="w3-bar-item w3-button w3-padding"><i class="fa fa-money fa-fw"></i>    {{ $acara->nama }}</a>
  <a href="{{ route('Event.Penjualan',['id'=> $acara->id]) }}" class="w3-bar-item w3-button w3-padding"><i class="fa fa-money fa-fw"></i>    Laporan Penjualan</a>
  <a href="{{ route('Event.Pemesan',['id'=> $acara->id]) }}" class="w3-bar-item w3-button w3-padding"><i class="fa fa-money fa-fw"></i>    Data Pemesan</a>
  <a href="{{ route('Event.Checkin',['id'=> $acara->id]) }}" class="w3-bar-item w3-button w3-padding"><i class="fa fa-money fa-fw"></i>    Check in</a>
  <a href="{{ route('Event.Sales',['id'=> $acara->id]) }}" class="w3-bar-item w3-button w3-padding"><i class="fa fa-money fa-fw"></i>    Sales</a>
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


  <p>
  <div class="w3-row-padding">
    <div class="w3-half">
    <input type="text" class="w3-bar-item w3-input" placeholder="Cari Pembeli....">
    </div>
  </div>
  </p>


  <div class="w3-container city" >
      <!--Awal Tabel-->
      @if (isset($tikets))
        <div class="w3-responsive">
          <table class="w3-table-all">
            <tr>
              <th>Nama Tiket</th>
              <th>Nomor Tiket</th>
              <th>Checkin</th>
            </tr>
              @foreach ($tikets as $tiket)
                <tr>
                  <td>{{ $tiket->Produk->nama }} ({{ $tiket->nama }})</td>
                  <td>{{ $tiket->id }}</td>
                  <td>
                    {{-- TIKET --}}
                    <form action="{{ route('Event.Checkin.Update',['transaksi_id'=>$tiket->id]) }}" method="post">
                      {{-- <input type="hidden" name="tiket_id" value="{{$tiket->id}}"> --}}
                      <input type="submit" value="Checkin"></input>
                      {{ csrf_field() }}
                      <input type="hidden" name="_method" value="PUT">
                    </form>

                  </td>
                </tr>
              @endforeach


          </table>
        </div>
      @endif
      <p>
      <div class="w3-responsive">
        <table class="w3-table-all">
          <tr>
            <th>Nama Pemesan</th>
            <th>Nomor Transaksi</th>
            <th>Jumlah Tiket</th>
            <th>Lihat</th>
          </tr>
          @foreach ($transaksis as $transaksi)
            <tr>
              <td>{{ $transaksi->nama }}</td>
              <td>{{ $transaksi->id }}</td>
              <td>{{ $transaksi->Tiket->count() }}</td>
              <td>
                {{-- TRANSAKSI --}}
                <form action="{{ route('Event.Checkin',['id'=>$id]) }}" method="get">
                  <input type="hidden" name="transaksi_id" value="{{ $transaksi->id }}"></input>
                  <button class="w3-btn w3-teal">Lihat</button>
                </form>
               </td>
            </tr>
          @endforeach
        </table>
      </div>
      </p>
  </div>




  </div>
  <!--Akhir Container-->




@endsection
