@extends('layouts.master')
{{-- @extends('layouts.app') --}}
@section('title')
HOME
@endsection

@section('nama_user')
budi
@endsection

@section('nama_halaman')
Detail Acara
@endsection


@section('content')
<div class="w3-row-padding">
  <div class="w3-half">
    <img src="{{ asset('/storage/event/'.$acara->gambar) }}" alt="{{ $acara->gambar }}" style="width:100%" class="w3-left">
  </div>
  <div class="w3-half">
    <br>
    @if (isset($link))
        <br>
        <b>
          Anda sudah terdaftar sebagai sales. Berikut adalah link afiliasi anda:
        </b>
      <br>
      {{ $link->link }}
      <br>
      <a href="{{ route('Public.Event.Show', ['link'=> $link->link]) }}">www.vihosystem.com/event/{{ $link->link }}</a>
    @else
      <a href="{{ route('Home.Sales.Regis',['acara_id'=>$acara->id]) }}" class="w3-button w3-orange">Daftar sebagai Sales</a>
    @endif
    <br>

    <h4 class="w3-bar-item w3-teal">{{ $acara->nama }} </h4>
    {{-- {{ $loop->iteration }} ({{ $loop->iteration % 3 }}) <br> --}}
    <table>
      <tr>
        <td>
          <b>
            Tanggal
          </b>
        </td>
        <td>
          {{ $acara->tgl_selesai }} -
          {{ $acara->tgl_selesai }}
        </td>
      </tr>
      <tr>
        <td>
          <b>
            Waktu
          </b>
        </td>
        <td>
          {{ $acara->wkt_mulai }} - {{ $acara->wkt_selesai }}
        </td>
      </tr>
      <tr>
        <td>
          <b>
            Kapasitas
          </b>
        </td>
        <td>
          {{ $acara->kapasitas }}
        </td>
      </tr>
      <tr>
        <td>
          <b>
            Tempat
          </b>
        </td>
        <td>
          {{ $acara->nama_tempat }}
        </td>
      </tr>
      <tr>
        <td>
          <b>
            Alamat
          </b>
        </td>
        <td>
          {{ $acara->alamat }}
        </td>
      </tr>
      <tr>
        <td>
          <b>
            Kota
          </b>
        </td>
        <td>
          {{ $acara->kota }}
        </td>
      </tr>
      <tr>
        <td colspan="2">
          <b>
            Deskripsi :
          </b>
          <br>
          {{ $acara->deskripsi }}
        </td>
      </tr>
    </table>


  </div>
</div>
<br>

@endsection
