@extends('layouts.create_master')
@section('title')
EDIT EVENT
@endsection

@section('content')
  <div class="w3-container w3-teal">
  <h2>Viho System</h2>
</div>
<div class="w3-padding">

  <div class="w3-half w3-padding">
    <div class="w3-card-4">
      <div class="w3-container w3-teal">
        <h2>Ubah Acara</h2>
      </div>
      <form enctype="multipart/form-data" class="w3-container" action="{{ route('Event.Update',['id'=>$acara->id]) }}" method="post">
        <p>
        <img src="{{ asset('/storage/event/'.$acara->gambar) }}" alt="{{$acara->gambar}}" style="width:100%">
        <label>Ubah Gambar Event</label>
        <input class="w3-input" type="file" name="event_img" ></p>
        @if ($errors->has('event_img'))
          <p> {{ $errors->first('event_img') }} </p>
        @endif
        <p>
        <label>Nama Acara</label>
        <input class="w3-input" type="text" name="nama" value="{{ (isset($acara)?$acara->nama:'')  }}"></p>
        <p>
        <label>Kapasitas</label>
        <input class="w3-input" type="number" name="kapasitas" value="{{ (isset($acara)?$acara->kapasitas:'')  }}"></p>
        {{-- <p>
        <label>Jenis Acara</label>
        <input class="w3-input" type="text" name="jenis_acara" value=""></p> --}}
        <p>
        <label>Tanggal Mulai</label>
        <input class="w3-input" type="date" name="tgl_mulai" value="{{ (isset($acara)?$acara->tgl_mulai:'')  }}"></p>
        <p>
        <label>Tanggal Selesai</label>
        <input class="w3-input" type="date" name="tgl_selesai" value="{{ $acara->tgl_selesai }}"></p>
        <p>
        <label>Waktu Mulai</label>
        <input class="w3-input" type="time" name="wkt_mulai" value="{{ $acara->wkt_mulai }}"></p>
        <p>
        <label>Waktu Selesai</label>
        <input class="w3-input" type="time" name="wkt_selesai" value="{{ $acara->wkt_selesai }}"></p>
        <p>
        <label>Nama Tempat</label>
        <input class="w3-input" type="text" name="nama_tempat" value="{{ $acara->nama_tempat }}"></p>
        <p>
        <label>Alamat</label>
        <input class="w3-input" type="text" name="alamat" value="{{ $acara->alamat }}"></p>
        <p>
        <label>Kota</label>
        <input class="w3-input" type="text" name="kota" value="{{ $acara->kota }}" ></p>
        <p>
        <label>Deskripsi</label>
        <textarea class="w3-input" type="text" name="deskripsi"> {{ $acara->deskripsi }} </textarea>
        </p>
        <input type="submit" value="Simpan Acara" class="w3-btn w3-black"></input>
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="PUT">
        <a href="{{ url()->previous() }}" class="w3-btn w3-yellow">Kembali</a>
      </form>
    </div>
  </div>


  {{-- <div class="w3-half w3-padding">
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


  <div class="w3-container city" >

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

          </tr>


        </table>
      </div>
      </p>
  </div> --}}
</div>

</div>
@endsection
