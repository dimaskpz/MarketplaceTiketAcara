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
  <p>
    <label>Nama Rekening</label>
    <input class="w3-input" type="text" name="nama_rekening" value="{{ Auth::user()->nama_rekening }}">
  </p>
  <p>
    <label>Nomor Rekening</label>
    <input class="w3-input" type="text" name="no_rekening" value="{{Auth::user()->no_rekening}}">
  </p>

  <input class="w3-button w3-black" type="submit" name="submit" value="Simpan">
  {{ csrf_field() }}
</form>
</div>

@endsection
