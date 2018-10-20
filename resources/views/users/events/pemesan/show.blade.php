@extends('layouts.master')

@section('title')
EVENT
@endsection
@section('nama_user')
budi
@endsection
@section('nama_halaman')
DATA PEMESAN
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
          {{-- @foreach ($dtrans as $dtran)
            <tr>
              <td > {{ $dtran->jumlah }} tiket ({{ $dtran->produk->nama }}) </td>
              <td></td>
            </tr>
          @endforeach --}}
          {{-- @foreach ($pemesans as $p)
            <tr>
              <td>{{ $p->nama }}</td>
              <td>{{ $p->id }}</td>
              <td>{{ $p->ispaid }}</td>
              <td>{{ $p->user->name }}</td>
              <td> <a href="{{ route('Event.Pemesan.Show',['id'=>$p->id]) }}" class="w3-btn w3-teal">Lihat</a> </td>
            </tr>
          @endforeach --}}
        </table>
      </div>
      </p>
  </div>
      <!--Akhir Tabel-->

  </div>
  <!--Akhir Container-->




@endsection
