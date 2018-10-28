@extends('layouts.create_master')
@section('title')
CREATE EVENT
@endsection

@section('content')
  <div class="w3-container w3-teal">
  <h2>CREATE EVENT</h2>
</div>
<div class="w3-padding">

  <div class="w3-half w3-padding">
    <div class="w3-card-4">
      <div class="w3-container w3-teal">
        <h2>Acara</h2>
      </div>
      <form enctype="multipart/form-data" class="w3-container" action="{{ route('Event.Store') }}" method="post">
        <p>
        <label>Gambar Acara</label>
        <input class="w3-input" type="file" name="featured_img"></p>
        @if ($errors->has('featured_img'))
          <p> {{ $errors->first('featured_img') }} </p>
        @endif
        <p>
        <label>Nama Acara</label>
        <input class="w3-input" type="text" name="nama" ></p>
        <p>
        <label>Kapasitas</label>
        <input class="w3-input" type="text" name="kapasitas" ></p>

        <p>
        <label>Tanggal Mulai</label>
        <input class="w3-input" type="date" name="tgl_mulai" ></p>
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
        <label>Nama Tempat</label>
        <input class="w3-input" type="text" name="nama_tempat"></p>
        <p>
        <label>Alamat</label>
        <input class="w3-input" type="text" name="alamat"></p>
        <p>
        <label>Kota</label>
        <input class="w3-input" type="text" name="kota"></p>
        <p>
        <label>Deskripsi</label>
        <textarea class="w3-input" type="text" name="deskripsi"></textarea>
        </p>
        <input type="submit" name="submit" value="Simpan Acara" class="w3-btn w3-black"></input>
        {{ csrf_field() }}
      </form>
    </div>
  </div>



<div class="w3-half w3-padding">
  <form action="{{ url('store') }}" method="POST" enctype="multipart/form-data">
    {!! csrf_field() !!}
    <div class="row">
          <div class="input-field col s12">
            <input type="text" class="validate" name="judul">
            <label for="title">Judul</label>
          </div>
    </div>

      <div class="row">
        <div class="input-field col s12">
          <textarea id="textarea1" class="materialize-textarea" name="isi"></textarea>
          <label for="textarea1">Isi</label>
        </div>
      </div>
      <div class="row">
        <div class="col s6">
            <img src="http://placehold.it/100x100" id="showgambar" style="max-width:200px;max-height:200px;float:left;" />
        </div>
    </div>
    <div class="row">
        <div class="input-field col s6">
          <input type="file" id="inputgambar" name="gambar" class="validate"/ >
        </div>
      </div>
      <button type="submit" class="btn btn-flat pink accent-3 waves-effect waves-light white-text right">Submit <i class="material-icons right">send</i></button>
  </form>
</div>
</div>

</div>
@endsection
