@extends('layouts.create_master')
@section('title')
CREATE EVENT
@endsection

@section('content')
  <div class="w3-container w3-blue">
  <h2>PERSONAL INFO</h2>
</div>

<form action="{{ route('Event.Public.Store.Personal') }}" method="post">
<input type="hidden" name="acara_id" value="2">

  @for ($i=1; $i <= 1 ; $i++)

dtransaksi_id
<input type="text" name="dtransaksi_id" value="">
<br>
Nama
<input type="text" name="nama" value="">
<br>
Jenis Kelamin
<select name="jenis_kelamin">
     <option value="L">Laki-laki</option>
     <option value="P">Perempuan</option>
</select>
   <br>
Tanggal Lahir
<input type="date" name="tgl_lahir" value="">
  <br>
Nomor KTP
<input type="text" name="no_ktp" value="">
  <br>
Nomor Telepon  <input type="number" name="tlp" value="">
  <br>
Email  <input type="email" name="email" value="">
  <br>
  <input type="submit" name="submit" value="Submit"></input>
  {{ csrf_field() }}
</form>

@endfor

@endsection
