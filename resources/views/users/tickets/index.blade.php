@extends('layouts.master')

@section('title')
TICKET
@endsection

@section('nama_user')
  {{ Auth::user()->name }}
@endsection


@section('nama_halaman')
Ticket yang Anda Pesan
@endsection
@section('body')
  onload="openEvent(event, 'tabaktif');"
@endsection
@section('content')


<div class="w3-container w3-padding-32">

  <!--Search Bar-->
  <h3>Event</h3>
  <p>
  <div class="w3-row-padding">
    <div class="w3-half">
    <input type="text" class="w3-bar-item w3-input" placeholder="Cari Event....">
    </div>
  </div>
  </p>
    <!--Tabs-->
    <p>
    <div class="w3-row">
      <a href="javascript:void(0)" onclick="openEvent(event, 'tabaktif');">
        <div class="w3-third tablink w3-bottombar w3-hover-light-grey w3-padding">EVENT AKTIF</div>
      </a>
      <a href="javascript:void(0)" onclick="openEvent(event, 'tablalu');">
        <div class="w3-third tablink w3-bottombar w3-hover-light-grey w3-padding">EVENT LALU</div>
      </a>
    </div>
    </p>

    <div id="tabaktif" class="w3-container city" style="display:none">
        <!--Awal Tabel-->
        <p>
        <div class="w3-responsive">
          <table class="w3-table-all">
            <tr>
              <th>Nama Event</th>
              {{-- <th>Kapasitas</th> --}}
              <th>Tanggal Event</th>
              <th>Venue dan Lokasi</th>
              <th>Tanggal Beli</th>
              <th>Lihat</th>
            </tr>



            @foreach ($transaksis as $transaksi)
              <tr>

              <td>
                {{ $transaksi->Acara->nama }}
              </td>
              <td>{{ $transaksi->Acara->tgl_mulai }}</td>
              <td>{{ $transaksi->Acara->alamat }}, {{ $transaksi->Acara->kota }}</td>
              <td>{{ $transaksi->created_at }}</td>
              <td>
                <div class="w3-padding-row">
                  <a href="{{ route('Ticket.Show', ['id' => $transaksi->id]) }}" class="w3-btn w3-teal">Nota</a>
                  <form  action="{{ route('Public.Eticket', ['transaksi_id' => $transaksi->id]) }}" method="post">
                    <button type="submit" name="submit" class="w3-btn w3-teal">E-Tiket</button>
                    {{ csrf_field() }}
                  </form>
                </div>
              </td>
            </tr>
            @endforeach

          </table>
        </div>
        </p>
    </div>
        <!--Akhir Tabel-->

    <div id="tablalu" class="w3-container city" style="display:none">
      <p>
      <div class="w3-responsive">
        <table class="w3-table-all">
          <tr>
            <th>Nama Event</th>
            <th>Tanggal Event</th>
            <th>Waktu</th>
            <th>Kapasitas</th>
            <th>Venue dan Lokasi</th>
          </tr>
          {{-- @foreach ($transaksis_lalu as $lalu)
            <tr>

            <td>
              {{ $lalu->Acara->nama }}
            </td>
            <td>{{ $lalu->Acara->tgl_mulai }}</td>
            <td>{{ $lalu->Acara->alamat }}, {{ $lalu->Acara->kota }}</td>
            <td>{{ $lalu->created_at }}</td>
            <td>
              <div class="w3-padding-row">
                <a href="{{ route('Ticket.Show', ['id' => $lalu->id]) }}" class="w3-btn w3-teal">Nota</a>
                <form  action="{{ route('Public.Eticket', ['transaksi_id' => $lalu->id]) }}" method="post">
                  <button type="submit" name="submit" class="w3-btn w3-teal">E-Tiket</button>
                  {{ csrf_field() }}
                </form>
              </div>
            </td>
          </tr>
          @endforeach --}}
        </table>
      </div>
      </p>
    </div>
    <!--Akhir Tabs-->

  </div>
  <!--Akhir Container-->



  <script>
  function openEvent(evt, cityName) {
    var i, x, tablinks;
    x = document.getElementsByClassName("city");
    for (i = 0; i < x.length; i++) {
       x[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablink");
    for (i = 0; i < x.length; i++) {
       tablinks[i].className = tablinks[i].className.replace(" w3-border-red", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.firstElementChild.className += " w3-border-red";
  }
  </script>


@endsection
