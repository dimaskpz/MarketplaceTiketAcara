@extends('layouts.create_master')
@section('title')
CREATE EVENT
@endsection

@section('content')
  <div class="w3-container w3-blue">
  <h2>Input Form</h2>
</div>

<form class="w3-container">
  <p>
  <label>First Name</label>
  <input class="w3-input" type="text"></p>
  <p>
  <label>Last Name</label>
  <input class="w3-input" type="text"></p>
  <p>
  <label>Email</label>
  <input class="w3-input" type="text"></p>
</form>
@endsection
