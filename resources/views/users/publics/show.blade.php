@extends('layouts.create_master')
@section('title')
CREATE EVENT
@endsection

@section('content')
  <div class="w3-container w3-blue">
  <h2>EVENT PUBLIC</h2>
</div>



  <p>
  <label>Gambar Acara</label>
  <input class="w3-input" type="file" name="gambar" ></p>

  <p>
  <label>Nama Acara</label>
  <input class="w3-input" type="text" name="nama" value="{{ $acara->nama }}"></p>
  <p>
  <label>Kapasitas</label>
  <input class="w3-input" type="text" name="kapasitas" value="{{ $acara->kapasitas }}"></p>
  <p>
  <label>Jenis Acara</label>
  <input class="w3-input" type="text" name="jenis_acara" ></p>

  <p>
  <label>Tanggal Mulai</label>
  <input class="w3-input" type="date" name="tgl_mulai" value="{{ $acara->tgl_mulai }}"></p>

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
  <input class="w3-input" type="text" name="deskripsi"></p>


@endsection
