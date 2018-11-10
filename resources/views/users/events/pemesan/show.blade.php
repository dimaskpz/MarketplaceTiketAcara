@extends('layouts.master')

@section('title')
{{ $acara->nama }}
@endsection

@section('nama_halaman')
Detail Data Pesanan
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
    <b><h2>
      {{ $acara->nama }}
     </h2></b>
  </div>

  <p>
  {{-- <div class="w3-row-padding">
    <div class="w3-half">
    <input type="text" class="w3-bar-item w3-input" placeholder="Cari Pemesan....">
    </div>
  </div> --}}
  </p>
<a class="w3-btn" href="{{ route('Event.Pemesan',['id'=>$transaksi->acara_id]) }}">Kembali</a>
  <div class="w3-container city" >
      <!--Awal Tabel-->
      <p>
      <div class="w3-responsive">
        <table class="w3-table-all">
          <tr>
            <th>Detail Transaksi</th>
            <th></th>
          </tr>
          <tr>
            <td>Nomor Invoice</td>
            <td>{{$transaksi->no_nota}}</td>
          </tr>
          <tr>
            <td>Nama :</td>
            <td>{{ $transaksi->nama }}</td>
          </tr>
          <tr>
            <td>Email :</td>
            <td>{{ $transaksi->email }}</td>
          </tr>
          <tr>
            <td>Telepon :</td>
            <td>{{ $transaksi->tlp }}</td>
          </tr>
          <tr>
            <td>Total :</td>
            <td> Rp {{ number_format($total,0,"",".") }} </td>
          </tr>
          <tr>
            <td>Status Pembayaran :</td>
            <td>
              @if ($transaksi->ispaid == 'y')
                {{ 'Lunas' }}
              @else
                {{ 'Belum Lunas' }}
                <br>
                <a href="{{ route('Event.Ticket.Konfirmasi',['transaksi_id'=> $transaksi->id]) }}" class="w3-btn w3-blue">Konfirmasi</a>
              @endif
            </td>
          </tr>

          <tr>
            <td>Tiket yang dibeli :</td>
          </tr>

          @foreach ($tikets as $t)
            <tr>
              <td> tiket {{ $t->Produk->nama }}</td>
              <td>@ Rp {{ number_format($t->Produk->harga,0,"",".") }}</td>
            </tr>
          @endforeach
          @if ($transaksi->isupload == 'y')
            <tr>
              <td>Bukti Pembayaran</td>
              <td>
                <a href="/storage/bukti/{{$transaksi->no_nota}}.jpg">
                  <img src="{{ asset('/storage/bukti/'.$transaksi->no_nota).'.jpg' }}" alt="{{$transaksi->no_nota}}" style="width:50%";height:200px class="w3-left">
                </a>
              </td>
            </tr>
          @endif
        </table>
      </div>
      </p>
  </div>
      <!--Akhir Tabel-->

  </div>
  <!--Akhir Container-->




@endsection
