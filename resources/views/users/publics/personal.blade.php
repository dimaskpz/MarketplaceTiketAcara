@extends('layouts.create_master')
@section('title')
CREATE EVENT
@endsection


@section('content')
  <div class="w3-container w3-blue">
    <h2>PERSONAL INFO</h2>
  </div>

  <div class="w3-padding">
    <div class="w3-half w3-padding">



      <form action="{{ route('Event.Public.Store.Personal') }}" method="post">
        <input type="hidden" name="acara_id" value="2"></input>
        @for ($g=0; $g < $jumlah_produk ; $g++)
            @for ($i=0; $i < $jenis_produks[$g]; $i++)
              <div class="w3-card-4">
                <div class="w3-padding">
                  <div class="w3-container w3-blue">
                    <h2> Tiket {{ $nama_produks[$g] }} - {{  $i + 1 }} </h2>
                    <h5>  </h5>
                  </div>
                  <p>
                    <label>TIKET</label>
                    <input class="w3-input" type="text" name="dtransaksi_id" value="tiket_id{{ $g + 1 . $i +1 }}">
                    <input disabled class="w3-input" type="text" name="tiket_id{{ $g + 1 . $i +1 }}" value="{{ uniqid() }}">
                  </p>
                  <p>
                    <label>Nama</label>
                    <input class="w3-input" type="text" name="nama{{ $g + 1 . $i +1 }}" value="">
                  </p>
                  <p>
                    <label>Jenis Kelamin</label>
                    <select class="w3-select w3-border" name="jenis_kelamin{{ $g + 1 . $i +1 }}">
                      <option value="L">Laki-laki</option>
                      <option value="P">Perempuan</option>
                    </select>
                  </p>
                  <p>
                    <label>Tanggal Lahir</label>
                    <input class="w3-input" type="date" name="tgl_lahir{{ $g + 1 . $i +1 }}" value="">
                  </p>
                  <p>
                    <label>Nomor KTP</label>
                    <input class="w3-input" type="number" name="no_ktp{{ $g + 1 . $i +1 }}" value="">
                  </p>
                  <p>
                    <label>Nomor Telepon</label>
                    <input class="w3-input" type="number" name="tlp{{ $g + 1 . $i +1 }}" value="">
                  </p>
                  <p>
                    <label>Email</label>
                    <input class="w3-input" type="email" name="email{{ $g + 1 . $i +1 }}" value="">
                  </p>
                  <p>
                  </p>
                </div>
              </div>
              <br>
            @endfor
        @endfor
        <input type="submit" name="submit" value="Submit"></input>
        {{ csrf_field() }}
      </form>
    </div>
  </div>
@endsection




      {{-- <form action="{{ route('Event.Public.Store.Personal') }}" method="post">
        <input type="hidden" name="acara_id" value="2"></input>
        @foreach ($produks as $tiket)
            @for ($i=0; $i < ; $i++)
              <div class="w3-card-4">
                <div class="w3-padding">
                  <div class="w3-container w3-blue">
                    <h2> Tiket {{ $produks[$g]->nama }} </h2>
                  </div>
                  <p>
                    <label>dtransaksi_id</label>
                    <input class="w3-input" type="text" name="dtransaksi_id" value="">
                  </p>
                  <p>
                    <label>Nama</label>
                    <input class="w3-input" type="text" name="nama" value="">
                  </p>
                  <p>
                    <label>Jenis Kelamin</label>
                    <select class="w3-select w3-border" name="jenis_kelamin">
                      <option value="L">Laki-laki</option>
                      <option value="P">Perempuan</option>
                    </select>
                  </p>
                  <p>
                    <label>Tanggal Lahir</label>
                    <input class="w3-input" type="date" name="tgl_lahir" value="">
                  </p>
                  <p>
                    <label>Nomor KTP</label>
                    <input class="w3-input" type="number" name="no_ktp" value="">
                  </p>
                  <p>
                    <label>Nomor Telepon</label>
                    <input class="w3-input" type="number" name="tlp" value="">
                  </p>
                  <p>
                    <label>Email</label>
                    <input class="w3-input" type="email" name="email" value="">
                  </p>
                  <p>
                    <input type="submit" name="submit" value="Submit"></input>
                    {{ csrf_field() }}
                  </p>
                </div>
              </div>
              <br>
            @endfor
        @endforeach
      </form> --}}
