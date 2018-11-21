@extends('layouts.master')

@section('title')
{{ $transaksi->Acara->nama }}
@endsection

@section('nama_halaman')
Affiliate
@endsection


@section('content')

  <div class="w3-container w3-padding-32">
    <div class="w3-bottombar w3-border-teal w3-text-teal">
      <b><h2>
        {{ $transaksi->Acara->nama }}
      </h2></b>
    </div>
    <p>
      <a href="{{ route('Affiliate.Show', ['acara_id'=> $transaksi->acara_id]) }}" class="w3-btn w3-black">Kembali</a>
    </p>

    <div class="w3-container city" >
      <p>
        <div class="w3-responsive">
          <table class="w3-table-all w3-hoverable">
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
              <td>Status Pembayaran :</td>
              <td>
                @if ($transaksi->ispaid == 'y')
                  {{ 'Lunas' }}
                @else
                  {{ 'Belum Lunas' }}
                @endif
              </td>
            </tr>
            <tr>
              <td colspan="2">Tiket yang dibeli :</td>
            </tr>
          </table>
        </div>
      </p>
    </div>
    <div class="w3-responsive">
      <table class="w3-table-all w3-hoverable">
        <tr>
          <th>No</th>
          <th>Tipe Tiket</th>
          <th>Jumlah</th>
          <th>@Harga Jual</th>
          <th>@Komisi</th>
          <th>Harga Jual</th>
          <th>Komisi</th>
        </tr>
        @for ($g=0; $g < $jumlah_produk ; $g++)
          <tr>
            <td>{{ $g+1 }}</td>
            @if ($jenis_produks[$g] != 0)
              <td>{{ $nama_produks[$g] }}</td>
              <td>{{ $jenis_produks[$g] }}</td>
              <td>Rp {{ number_format($harga_produks[$g],0,"",".") }}</td>
              <td>Rp {{ number_format($komisi_produks[$g],0,"",".") }}</td>
              <td>Rp {{ number_format($harga_produks[$g] * $jenis_produks[$g],0,"",".") }}</td>
              <td>Rp {{ number_format($komisi_produks[$g] * $jenis_produks[$g],0,"",".") }}</td>
            @endif
          </tr>
        @endfor
        <tr>
          <td colspan="5"><b>Total Pembayaran</b></td>
          <td>Rp {{ number_format($total,0,"",".") }}</td>
          <td>Rp {{ number_format($total_komisi,0,"",".") }}</td>
        </tr>
      </table>
    </div>
      <!--Akhir Tabs-->
    </div>
    <!--Akhir Container-->






@endsection
