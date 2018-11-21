@extends('layouts.master')

@section('title')
{{ $acara->nama }}
@endsection

@section('nama_halaman')
Sales Event
@endsection

@section('side_navigation')
  @include('layouts.sidebar_event')
@endsection

@section('nama_acara')
  {{ $acara->nama }}
@endsection
@section('content')
<div class="w3-container w3-padding-32">

  <div class="w3-bottombar w3-border-teal w3-text-teal">
    <b><h2> {{ $acara->nama }} </h2></b>
  </div>

{{-- SEARCH BAR --}}
  <p>
  <div class="w3-row-padding">
    <div class="w3-half">
    <input type="text" class="w3-bar-item w3-input" placeholder="Cari Sales....">
    </div>
  </div>
  </p>

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
            {{-- <th>Keuntungan Bersih</th> --}}
            <th>Email</th>
            <th>No Telepon</th>
            <th>Lihat</th>
            {{-- <th>Waktu</th> --}}
          </tr>

          @foreach ($saless as $s)
            <tr>
              <td>{{ $s->User->name }}</td>
              <td>4</td>
              <td>20</td>
              {{-- <td>Rp 5.000.000</td> --}}
              <td>{{ $s->User->email }}</td>
              <td>{{ $s->User->tlp }}</td>
              <td>
                {{-- <a href="{{ route('Event.Komisi.Show', ['user_id' => $s->User->id]) }}" class="w3-btn w3-teal">Detail Komisi</a> --}}
                <form  action="{{ route('Event.Komisi.Show', ['user_id' => $s->User->id]) }}" method="post">
                  <input type="hidden" name="acara_id" value="{{$acara->id}}">
                  <input type="hidden" name="user_id" value="{{$s->User->id}}">
                  <button type="submit" name="submit" class="w3-btn w3-teal">Detail Komisi</button>
                  {{ csrf_field() }}
                </form>
              </td>
              {{-- <td>{{ $s->tlp }}</td> --}}
              {{-- <td>{{ $s->penjualan }}</td> --}}
            </tr>

          @endforeach
          {{-- @foreach ($acaras as $acara)
            <tr>
              <td> {{ $acara->nama }} </td>
              <td> {{date('d-m-Y', strtotime($acara->tgl_mulai))}} </td>

              <td> {{ $acara->kapasitas }} </td>
              <td> {{ $acara->lokasi }} </td>
              <td> <a href="{{ route('Event.Show', ['id' => $acara->id]) }}" class="w3-btn w3-teal">Lihat</a> </td>
            </tr>
          @endforeach --}}
          {{-- <tr>
            <td>OVO Points</td>
            <td>18-19 Januari 2018</td>
            <td>09.00am-12.00pm</td>
            <td>400</td>
            <td>Universitas Ciputra</td>
          </tr> --}}
        </table>
      </div>
      </p>
  </div>
      <!--Akhir Tabel-->


</div>
<!--Akhir Container-->
@endsection
