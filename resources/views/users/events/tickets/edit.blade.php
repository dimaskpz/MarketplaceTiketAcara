@extends('layouts.create_master')
@section('title')
CREATE EVENT
@endsection

@section('content')
  <div class="w3-container w3-teal">
  <h2>Input Form</h2>
</div>
<div class="w3-padding">

  <div class="w3-half w3-padding">
    <div class="w3-card-4">
      <div class="w3-container w3-teal">
        <h2>Acara</h2>
      </div>
      <form class="w3-container" action="{{ route('Event.Store') }}" method="post">
        <p>
        <label>Gambar Acara</label>
        <input class="w3-input" type="file" name="gambar" ></p>
        <p>
        <label>Nama Acara</label>
        <input class="w3-input" type="text" name="nama" value="{{ (isset($acara)?$acara->nama:'')  }}"></p>
        <p>
        <label>Kapasitas</label>
        <input class="w3-input" type="text" name="kapasitas" value="{{ (isset($acara)?$acara->kapasitas:'')  }}"></p>
        {{-- <p>
        <label>Jenis Acara</label>
        <input class="w3-input" type="text" name="jenis_acara" value=""></p> --}}
        <p>
        <label>Tanggal Mulai</label>
        <input class="w3-input" type="date" name="tgl_mulai" value="{{ (isset($acara)?$acara->tgl_mulai:'')  }}"></p>
        <p>
        <label>Tanggal Selesai</label>
        <input class="w3-input" type="date" name="tgl_selesai"></p>
        <p>
        <label>Waktu Mulai</label>
        <input class="w3-input" type="time" name="wkt_mulai"></p>
        <p>
        <label>Waktu Selesai</label>
        <input class="w3-input" type="time" name="wkt_selesai"></p>
        <p>
        <label>Lokasi</label>
        <input class="w3-input" type="text" name="lokasi"></p>
        <p>
        <label>Deskripsi</label>
        <textarea class="w3-input" type="text" name="deskripsi"></textarea>
        </p>
        <input type="submit" value="Simpan Acara" class="w3-btn w3-black"></input>
        {{ csrf_field() }}
      </form>
    </div>
  </div>

  <div class="w3-half w3-padding">
    <div class="w3-card-4">
      <div class="w3-container w3-teal">
        <h2>Tiket</h2>
      </div>
      <form class="w3-container" action="/action_page.php">
        <div class="w3-half w3-padding">
          <p>
          <label>Nama Tiket</label>
          <input class="w3-input w3-border w3-sand" type="text" name="nama"></p>
          <p>
          <label>Jumlah Tiket</label>
          <input class="w3-input w3-border w3-sand" type="text" name="deskripsi"></p>
          <p>
          <label>Keterangan</label>
          <input class="w3-input w3-border w3-sand" type="text" name="deskripsi"></p>
          <p>
          <label>Tanggal Mulai</label>
          <input class="w3-input w3-border w3-sand" type="date" name="deskripsi"></p>
          <p>
          <label>Tanggal Selesai</label>
          <input class="w3-input w3-border w3-sand" type="date" name="deskripsi"></p>
          <p>
        </div>

        <div class="w3-half w3-padding">
          <p>
          <label>Komisi</label>
          <input class="w3-input w3-border w3-sand" type="text" name="deskripsi"></p>
          <p>
          <label>Tanggal Selesai</label>
          <input class="w3-input w3-border w3-sand" type="text" name="deskripsi"></p>
          <p>
          <label>Tanggal Selesai</label>
          <input class="w3-input w3-border w3-sand" type="text" name="deskripsi"></p>
          <p>
          <label>Tanggal Selesai</label>
          <input class="w3-input w3-border w3-sand" type="text" name="deskripsi"></p>
          <p>
          <label>Tanggal Selesai</label>
          <input class="w3-input w3-border w3-sand" type="text" name="deskripsi"></p>
          <button class="w3-btn w3-brown">Register</button></p>
        </div>

      </form>
    </div>

  {{-- TABEL --}}
  <div class="w3-container city" >
      <!--Awal Tabel-->
      <p>
      <div class="w3-responsive">
        <table class="w3-table-all">
          <tr>
            <th>Nama Sales</th>
            <th>Tiket Belum dibayar</th>
            <th>Penjualan Tiket</th>
            <th>Keuntungan Bersih</th>
            <th>Email</th>
            <th>No Telepon</th>
            {{-- <th>Lihat</th> --}}
            {{-- <th>Waktu</th> --}}
          </tr>

          {{-- @foreach ($saless as $s)
            <tr>
              <td>{{ $s->User->name }}</td>
              <td>4</td>
              <td>20</td>
            </tr>
          @endforeach --}}

        </table>
      </div>
      </p>
  </div>
<!--Akhir Tabel-->

</div>

</div>
@endsection