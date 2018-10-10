@extends('layouts.master')

@section('title')
AFFILLIATE
@endsection
@section('nama_user')
budi
@endsection
@section('nama_halaman')
Affiliate
@endsection


@section('content')
show
<a href="{{ route('Affiliate.Show', ['id' => 35]) }}">link</a>
tabel acara yang diikuti

<table class="w3-table">
<tr>
  <th>First Name</th>
  <th>Last Name</th>
  <th>Points</th>
</tr>
<tr>
  <td>Jill</td>
  <td>Smith</td>
  <td>50</td>
</tr>
</table>
@endsection
