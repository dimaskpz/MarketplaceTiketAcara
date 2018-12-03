@extends('layouts.master')

@section('title')
{{ $acara->nama }}
@endsection

@section('nama_halaman')
Check-in Peserta
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
  <form action="#" method="get">
    {{-- <p><h5>Cari</h5></p> --}}
    <div class="w3-row-padding">
      <div class="w3-third">
        <input class="w3-input" type="text" name="stran" placeholder="cari nomor transaksi, nama pemesan" value="{{ empty($_GET['stran']) ? '' : $_GET['stran'] }}">
      </div>
      <div class="">
        <button type="submit" class="w3-button w3-black w3-round-large">Cari</button>
      </div>
    {{-- <div class="w3-row-padding"> --}}
    <div class="w3-right">
      <button type="submit" class="w3-button w3-black w3-round-large">Cari</button>
    </div>
      <div class="w3-third w3-right">
        <input class="w3-input" type="text" name="stiket" placeholder="nomor tiket" value="{{ empty($_GET['stiket']) ? '' : $_GET['stiket'] }}">
      </div>
    </div>
    {{-- </div> --}}
  </form>
</p>


  <div class="w3-container city" >
      <!--Awal Tabel-->
      @if (isset($tikets))
        <div class="w3-responsive">
          <table class="w3-table-all">
            <tr>
              <th colspan="2">Nama Pemesan</th>
              <td colspan="3">{{ $tikets[0]->Transaksi->nama }}</td>
            </tr>
            <tr>
            <th colspan="2">Nomor Invoice</th>
            <td colspan="3">{{ $tikets[0]->Transaksi->no_nota }}</td>
          </tr>
          <tr>
          <th colspan="2">Status</th>
          <td colspan="3">{{ ($tikets[0]->Transaksi->ispaid == 'y'? 'Lunas' : 'Belum Lunas') }}</td>
        </tr>
            <tr>
              <th>No</th>
              <th>Nama Tiket</th>
              <th>Nomor Tiket</th>
              <th>Checkin</th>

            </tr>
              @foreach ($tikets as $tiket)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $tiket->Produk->nama }} ({{ $tiket->nama }})</td>
                  <td>{{ $tiket->no_tiket }}</td>
                  <td>
                    @if ($tiket->ischeckin == 'n')
                      {{-- TIKET --}}
                      <form action="{{ route('Event.Checkin.Update',['transaksi_id'=>$tiket->id]) }}" method="post">
                        <input class="w3-btn w3-orange" type="submit" value="Checkin"></input>
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="PUT">
                      </form>
                    @else
                      {{ $tiket->updated_at }}
                    @endif

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
              <td>{{ $transaksi->no_nota }}</td>
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
