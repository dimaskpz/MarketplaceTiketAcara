@extends('layouts.master')
{{-- @extends('layouts.app') --}}
@section('title')
PROFILE
@endsection



@section('nama_halaman')
Profile
@endsection


@section('content')
  @if ($errors->any())

      <div>
          <ul>
              @foreach ($errors->all() as $error)
                  <p>{{ $error }}</p>
              @endforeach
          </ul>
      </div>

  @endif
  <div class="w3-padding">
    <form action="{{ route('Profile.Update') }}" method="post">
    {{-- <p>
      <label>Nama Pengguna</label>
      <input class="w3-input" type="text" name="name" value="{{ Auth::user()->name }}">
    </p> --}}
    <p>
      <label>Nama Perusahaan</label>
      <input class="w3-input" type="text" name="nama_perusahaan" value="{{ Auth::user()->nama_perusahaan }}">
    </p>
    <p>
      <label>Alamat Perusahaan</label>
    <input class="w3-input" type="text" name="alamat" value="{{ Auth::user()->alamat }}">
  </p>
  <p>
    <label>Nomor Telepon</label>
    <input class="w3-input" type="text" name="tlp" value="{{ Auth::user()->tlp }}">
  </p>
  <br>
    <div class="w3-row">
    <div class="w3-half w3-padding">
      <label>Nama Pemilik Rekening</label>
      <input class="w3-input" type="text" name="nama_rekening" value="{{ Auth::user()->nama_rekening }}">
    <p>
      <label>Nomor Rekening</label>
      <input class="w3-input" type="text" name="no_rekening" value="{{Auth::user()->no_rekening}}">
    </p>
    </div>
    <div class="w3-quarter w3-padding">
      <label>Nama Bank</label>
      <select class="w3-select w3-border" name="bank">
        @if (empty(Auth::user()->bank))
          <option value="" disabled selected>Nama Bank</option>
        @endif
        <option @if (Auth::user()->bank == 'BCA') selected @endif value="BCA">BCA</option>
        <option @if (Auth::user()->bank == 'Mandiri') selected @endif value="Mandiri">Mandiri</option>
        <option @if (Auth::user()->bank == 'Maybank') selected @endif value="Maybank">Maybank</option>
        <option @if (Auth::user()->bank == 'BRI') selected @endif value="BRI">BRI</option>
        <option @if (Auth::user()->bank == 'BNI') selected @endif value="BNI">BNI</option>
      </select>
      {{-- <input class="w3-input" type="text" name="nama_rekening" value="{{ Auth::user()->nama_rekening }}"> --}}
    </div>
    </div>

  <br>

  <input class="w3-button w3-black" type="submit" name="submit" value="Simpan">
  {{ csrf_field() }}
</form>
</div>

@endsection
