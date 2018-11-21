@extends('layouts.master')

@section('title')
{{ $acara->nama }}
@endsection

@section('nama_halaman')
LAPORAN PENJUALAN
@endsection

@section('side_navigation')
  @include('layouts.sidebar_event')
@endsection

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
          @foreach ($acara->produk as $produk)
            <tr>
              <td>{{ $produk->nama }}</td>
              <td>Rp {{ number_format($produk->harga,0,"",".") }} </td>
              <td>{{ $produk->totalTiketLunas }}</td>
              <td>Rp. {{ number_format($produk->TotalTiketLunas * $produk->harga, 0, "", ".") }}</td>
              {{-- <td>{{ $transaksis->where('isupload','y')->Tiket->where('produk_id',$p->id) }}</td> --}}
            </tr>
          @endforeach
        </table>
      </div>
      </p>
  </div>




  </div>
  <!--Akhir Container-->




@endsection
