@extends('layouts.master')

@section('title')
AFFILLIATE
@endsection

@section('nama_halaman')
Affiliate
@endsection


@section('content')

  <div class="w3-container w3-padding-32">
    <div class="w3-bottombar w3-border-teal w3-text-teal">
      <b><h2>
        {{ $nama_acara }}
      </h2></b>
    </div>
    <p>
      <a href="{{ route('Affiliate_Default') }}" class="w3-btn w3-black">Kembali</a>
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
              <a href="#" class="w3-btn w3-teal">Detail Pesanan</a>
            </td>
          </tr>
        @endforeach
      </table>
    </div>
      <!--Akhir Tabs-->
    </div>
    <!--Akhir Container-->






@endsection
