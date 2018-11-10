@extends('layouts.master')

@section('title')
{{ $acara->nama }}
@endsection

@section('nama_halaman')
Data Pemesan
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

  <p>
  <div class="w3-row-padding">
    <div class="w3-half">
    <input type="text" class="w3-bar-item w3-input" placeholder="Cari Pemesan....">
    </div>
  </div>
  </p>

  <div class="w3-container city" >
      <!--Awal Tabel-->
      <p>
      <div class="w3-responsive">
        <table class="w3-table-all">
          <tr>
            <th>Nama Pemesan</th>
            <th>Nomor Transaksi</th>
            <th>Pembayaran</th>
            <th>Sales</th>
            <th>Lihat</th>
          </tr>
          @foreach ($pemesans as $p)
            <tr>
              <td>{{ $p->nama }}</td>
              <td>{{ $p->no_nota }}</td>
              <td>{{ ($p->ispaid == 'y' ?'Sudah Lunas':'Belum Bayar') }}</td>
              <td>{{ $p->user->name }}</td>
              <td> <a href="{{ route('Event.Pemesan.Show',['transaksi_id'=>$p->id]) }}" class="w3-btn w3-teal">Lihat</a> </td>
            </tr>
          @endforeach
          {{-- @if ($p)

          @endif --}}
        </table>
      </div>
      </p>
  </div>
      <!--Akhir Tabel-->

  </div>
  <!--Akhir Container-->




@endsection
