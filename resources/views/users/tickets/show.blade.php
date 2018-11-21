@extends('layouts.master')

@section('title')
{{ $acara->nama }}
@endsection

@section('nama_halaman')
Detail Pesanan Tiket
@endsection


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
<a class="w3-btn w3-black" href="{{ route('Ticket_Default') }}">Kembali</a>
<div class="w3-container city" >
  <p>
    <div class="w3-responsive">
      <table class="w3-table-all">
        <tr>
          <th>Detail Transaksi</th>
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
            @endif
          </td>
        </tr>
        <tr>
          <td>Tiket yang dibeli :</td>
          <td>
            @for ($g=0; $g < $jumlah_produk ; $g++)
              @if ($jenis_produks[$g] != 0)
                ({{ $nama_produks[$g] }})
                {{ $jenis_produks[$g] }} Tiket
                Rp {{ number_format($harga_produks[$g] * $jenis_produks[$g],0,"",".") }}
                <br>
              @endif
            @endfor
          </td>
        </tr>
        @if ($transaksi->isupload == 'y')
          <tr>
            <td>Bukti Pembayaran</td>
            <td>
              <a href="/storage/bukti/{{$transaksi->no_nota}}.png">
                <img src="{{ asset('/storage/bukti/'.$transaksi->no_nota).'.jpg' }}" alt="{{$transaksi->no_nota}}" style="width:50%";height:200px class="w3-left">
              </a>
            </td>
          </tr>
        @endif
      </table>
      <form class="w3-padding" action="{{ route('Public.Trans.Cek') }}" method="post">
        <input type="hidden" name="no_nota" value="{{$transaksi->no_nota}}">
        <input type="hidden" name="email" value="{{ Auth::user()->email }}">
        <button class="w3-btn w3-black" type="submit" name="button">Halaman Transaksi</button>
        {{ csrf_field() }}
      </form>
    </div>
  </p>
</div>

      <!--Akhir Tabel-->

  </div>
  <!--Akhir Container-->




@endsection
