@extends('layouts.master')
{{-- @extends('layouts.app') --}}
@section('title')
HOME
@endsection

@section('nama_user')
budi
@endsection

@section('nama_halaman')
Home
@endsection


@section('content')

  <div class="w3-padding">

    @isset($acaras)
      @foreach ($acaras as $acara)
        @if ($loop->iteration % 3 == 1)
            <div class="w3-row-padding">
        @endif

        <div class="w3-third">
          <div class="w3-card">
            <a href="{{ route('Home.Event.Show', ['acara_id'=> $acara->id]) }}">
              <img src="{{ asset('/storage/event/'.$acara->gambar) }}" alt="{{ $acara->gambar }}" style="width:100%" class="w3-center w3-opacity w3-hover-opacity-off">
            </a>
            <h5>{{ $acara->nama }} </h5>
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
                <td>Kota</td>
                <td>
                  {{ $acara->kota }}
                </td>
              </tr>
            </table>
          </div>
          </div>

        @if ($loop->iteration % 3 == 0)
        </div>
        <br>
        @endif
        {{-- @if (($loop->iteration / 4) == 0)
          <br>
        @endif --}}
      @endforeach
    @endisset

  </div>

@endsection
