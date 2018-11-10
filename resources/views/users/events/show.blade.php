@extends('layouts.master')

@section('title')
{{ $acara->nama }}
@endsection
@section('nama_user')
budi
@endsection
@section('nama_halaman')
Dashboard Event
@endsection



@section('side_navigation')
  @include('layouts.sidebar_event')
@endsection
@section('nama_acara')
  {{ $acara->nama }}
@endsection
@section('content')
<div class="w3-container w3-padding-32">
  <!--Search Bar-->
  <div class="w3-bottombar w3-border-teal w3-text-teal">
    <b><h2> {{ $acara->nama }} </h2></b>
  </div>

  <p>
  <div class="w3-row-padding">
    <div class="w3-half">
      <p>
      <div class="w3-card-4 w3-teal" style="width:75%">
        {{-- <img src="/images/DWP.jpg" alt="Image 3" style="width:100%"> --}}
        <img src="{{ asset('/storage/event/'.$acara->gambar) }}" alt="{{$acara->gambar}}" style="width:100%">
        <div class="w3-container w3-center">
          <p> {{ $acara->nama }} </p>
        </div>
      </div>
      </p>
    </div>
    <div class="w3-half">
      <p>
      <ul class="w3-ul w3-card-4 w3-white ">
        <li class="w3-bar">
          {{-- <img src="img_avatar2.png" class="w3-bar-item w3-circle w3-hide-small" style="width:85px"> --}}
          <div class="w3-bar-item w3-border-left">
            <span class="w3-large">Omset</span><br>
            <span>Rp {{ number_format($acara->Transaksi->sum('total'),0,"",".") }}</span>            
          </div>
        </li>

        <li class="w3-bar">
          {{-- <img src="img_avatar5.png" class="w3-bar-item w3-circle w3-hide-small" style="width:85px"> --}}
          <div class="w3-bar-item w3-border-left">
            <span class="w3-large">Tiket Terjual</span><br>
            <span> {{ $acara->totalTiketAcara }} Tiket</span>
          </div>
        </li>

        <li class="w3-bar">
          {{-- <img src="img_avatar5.png" class="w3-bar-item w3-circle w3-hide-small" style="width:85px"> --}}
          <div class="w3-bar-item w3-border-left">
            <span class="w3-large">Transaksi</span><br>
            <span>{{ $acara->Transaksi->count() }}</span>
          </div>
        </li>

        <li class="w3-bar">
          {{-- <img src="img_avatar6.png" class="w3-bar-item w3-circle w3-hide-small" style="width:85px"> --}}
          <div class="w3-bar-item w3-border-left">
            <span class="w3-large">Sales</span><br>
            <span>{{ $acara->Link->count() }} Orang</span>
          </div>
        </li>
      </ul>
      </p>

      {{-- BUTTON EDIT --}}
      <p>
        <div class="w3-row-padding">
          <a href="{{ route('Event.Edit', ['id' => $acara->id]) }}" class="w3-btn w3-teal">Ubah Detail Acara</a>
          <a href=" {{ route('Event.Ticket.Create', ['id'=>$acara->id]) }} " class="w3-btn w3-teal">Pengaturan Tiket</a>
        </div>
      </p>
      {{-- AKHIR BUTTON EDIT --}}

    </div>
  </div>
  </p>


  <div class='w3-row-padding'>
    <div class="w3-card-4 w3-white w3-topbar w3-border-teal">
      <div class="w3-container">
        <div class='w3-row-padding'>
          <div class="w3-third">
            <p><b><label>Tanggal Mulai :</label></b></p>
            <p><b><label>Tanggal Selesai :</label></b></p>
            <p><b><label>Waktu :</label></b></p>
            <p><b><label>Lokasi :</label></b></p>
          </div>
          <div class="w3-two-third">
            <p><label> {{ $acara->tgl_mulai }} </label></p>
            <p><label> {{ $acara->tgl_selesai }} </label></p>
            <p><label> {{ $acara->wkt_mulai }} - {{ $acara->wkt_selesai }} </label></p>
            <p><label> {{ $acara->lokasi }} </label></p>
          </div>
        </div>
      </div>
    </div>
  </div>


  </div>
  <!--Akhir Container-->




@endsection
