@extends('layouts.create_master')
@section('title')
{{(isset($acara)?$acara->nama:'')}}
@endsection

@section('content')
  <div class="w3-container w3-blue">
  <h2>{{(isset($acara)?$acara->nama:'')}}</h2>
</div>

<div class="w3-half w3-padding ">
<img src="{{ asset('/storage/event/'.$acara->gambar) }}" alt="gambar acara {{(isset($acara)?$acara->nama:'')}}" style="width:100%" class="w3-center ">
  <table>
    <tr>
      <td>
        Waktu
      </td>
      <td>
        : {{ (isset($acara)?$acara->tgl_mulai:'')  }} - {{ $acara->tgl_selesai }}
      </td>
    </tr>
    <td></td>
    <td>{{ $acara->wkt_mulai }} - {{ $acara->wkt_selesai }}</td>
  </table>

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
</div>

<div class="w3-half w3-padding">
<div class="w3-card-4 w3-padding">

  <form action="{{ route('Public.Event.Personal') }}" method="post">
    <input type="hidden" name="kode_unik" value="{{ $kode_unik }}"></input>
    <input type="hidden" name="acara_id" value="{{ $acara->id }}"></input>
    <input type="hidden" name="user_id" value="{{ $user_id }}"></input>
    <input type="hidden" name="jumlah_produk" value="{{ $jumlah_produk }}"></input>
      @foreach ($produks as $p)
        {{-- {{ $loop->iteration }} --}}
        <br>
        <label>
        <b>
          Tiket {{ $p->nama }}
        </b>
      </label>
        <br>
        Rp {{ number_format($p->harga,0,"",".") }}
        <br>
        Berakhir pada {{ $p->tgl_selesai }}
        <br>
        <div class="w3-quarter">
        <input class="w3-input"name="tipe{{$loop->iteration - 1}}" type="number" step="1" value="0" min="0" max="5"></input>
      </div>
        <br>
        <br>
      @endforeach
    <br>
    <input class="w3-btn w3-black" type="submit" value="Beli Tiket"></input>
    {{ csrf_field() }}
  </form>

</div>
</div>
@endsection
