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
      @if ($errors->any())

          <div>
              <ul>
                  @foreach ($errors->all() as $error)
                      <p>{{ $error }}</p>
                  @endforeach
              </ul>
          </div>

      @endif
      <form enctype="multipart/form-data" class="w3-container" action="{{ route('Event.Store') }}" method="post">
        <p>
        <label>Gambar Acara</label>
        <input class="w3-input" type="file" name="event_img"></p>
        @if ($errors->has('event_img'))
          <p> {{ $errors->first('event_img') }} </p>
        @endif
        <p>
        <label>Nama Acara</label>
        <input class="w3-input" type="text" name="nama" ></p>
        <p>
        <label>Tanggal Mulai</label>
        <input class="w3-input" type="date" name="tgl_mulai" min="{{date('Y-m-d')}}"></p>
        <p>
        <label>Tanggal Selesai</label>
        <input class="w3-input" type="date" name="tgl_selesai" min="{{date('Y-m-d')}}"></p>
        <p>
        <label>Waktu Mulai</label>
        <input class="w3-input" type="time" name="wkt_mulai" ></p>
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
        <input type="submit" name="submit" value="Simpan Acara" class="w3-btn w3-orange"></input>
        {{ csrf_field() }}
      </form>
    </div>
  </div>


</div>

</div>
@endsection
