@extends('layouts.master')

@section('title')
{{ $nama_acara }}
@endsection

@section('nama_halaman')
Affiliate
@endsection

@section('side_navigation')
  @include('layouts.sidebar_event')
@endsection

@section('content')

  <div class="w3-container w3-padding-32">
    <div class="w3-bottombar w3-border-teal w3-text-teal">
      <b><h2>
        {{ $nama_acara }}
      </h2></b>
    </div>
    <p>
      <a href="{{ route('Event.Sales',['id'=> $acara->id]) }}" class="w3-btn w3-black">Kembali</a>
    </p>

<div class="w3-half">
    <div class="w3-responsive">

      <table class="w3-table-all">
        <tr>
          <th colspan="2">INFORMASI TOTAL</th>
        </tr>
        <tr>
          <td>
            <b>
              Omset
            </b>
          </td>
            <td>Rp {{ number_format($omset,0,"",".") }}</td>
        </tr>
        <tr>
          <td>
            <b>
              Bersih
            </b>
          </td>
            <td>Rp {{ number_format($bersih,0,"",".") }}</td>
        </tr>
        <tr>
          <td>
            <b>
             Transaksi
            </b>
          </td>
          <td>
          {{ $transaksis->count() }} Transaksi
        </td>
        </tr>
      </table>
    </div>

  </div>

    <!--Search Bar-->
    <div class="w3-row-padding">
      <h3>Pesanan</h3>
    </div>
    <p>
      <div class="w3-row-padding">
        <div class="w3-half">
          <input type="text" class="w3-bar-item w3-input" placeholder="Cari ....">
        </div>
      </div>
    </p>

    <div class="w3-responsive">
      <table class="w3-table-all">
        <tr>
          <th>Nama Pemesan</th>
          <th>Nomor invoice</th>
          <th>Tanggal Pembelian</th>
          <th>Pembayaran</th>
          <th>Lihat</th>
        </tr>

        @foreach ($transaksis as $transaksi)
          <tr>
            <td>{{ $transaksi->nama }}</td>
            <td>{{ $transaksi->no_nota }}</td>
            <td>{{ $transaksi->created_at }}</td>
            <td>
              @if ($transaksi->ispaid == 'y')
                Lunas
              @else
                Belum Lunas
              @endif
            </td>
            <td>
              {{-- <a href="{{ route('Affiliate.Show.Detail', ['transaksi_id'=>$transaksi->id]) }}" class="w3-btn w3-teal">Detail Pesanan</a> --}}
              <form  action="{{ route('Event.Komisi.Show.Detail', ['user_id' => $transaksi->id]) }}" method="post">
                {{-- <input type="hidden" name="acara_id" value="{{$acara->id}}"> --}}
                <input type="hidden" name="transaksi_id" value="{{$transaksi->id}}">
                {{-- <input type="hidden" name="user_id" value="{{$User_id}}"> --}}
                <button type="submit" name="submit" class="w3-btn w3-teal">Detail Pesanan</button>
                {{ csrf_field() }}
              </form>
            </td>
          </tr>
        @endforeach
      </table>
    </div>
      <!--Akhir Tabs-->
    </div>
    <!--Akhir Container-->






@endsection
