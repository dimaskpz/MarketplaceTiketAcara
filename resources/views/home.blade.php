@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
            <div class="links">
              <!-- <p><a href="#">Halaman Role Admin</a></p> -->
              <p><a href="{{ route('HRD_Default') }}">Halaman Role HRD</a></p>
              <p><a href="{{ route('Staff_Default') }}">Halaman Role Karyawan Biasa</a></p>
              <p><a href="{{ route('Finance_Default') }}">Halaman Role Penggaji</a></p>
            </div>
        </div>
    </div>
</div>
@endsection
