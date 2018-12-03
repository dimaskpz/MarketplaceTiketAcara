@extends('layouts.create_master')
@section('title')
{{(isset($acara)?$acara->nama:'')}}
@endsection

@section('content')
  <div class="w3-container w3-blue">
    <h2>UBAH DATA PESERTA</h2>
  </div>


      <div class="w3-half w3-padding">
{{--  --}}
{{-- <div class="w3-card-4">
  <div class="w3-padding">
    <div class="w3-container" style="background-color:#009933;color:white">
      <h2> Data Pemesan</h2>
    </div>
    <input type="hidden" name="kode_unik" value="{{ $kode_unik }}"></input>
    <input type="hidden" name="acara_id" value="{{ $acara->id }}"></input>
    <input type="hidden" name="jumlah_produk" value="{{ $jumlah_produk }}"></input>
    <input type="hidden" name="user_id" value="{{ $user_id }}">
    <p>
      <label>Nama</label>
      <input class="w3-input" type="text" name="nama_pembeli" value="Marcia Kamila Kabelo">
    </p>
    <p>
      <label>Nomor Telepon</label>
      <input class="w3-input" type="number" name="tlp_pembeli" value="408529485">
    </p>
    <p>
      <label>Email</label>
      <input class="w3-input" type="email" name="email_pembeli" value="ciananda7@gmail.com">
    </p>
  </div>
</div> --}}
<br>

        {{--  --}}
        {{-- @for ($i=0; $i < $jumlah_produk; $i++)
          <input type="hidden" name="tipe{{ $i }}" value="{{ $jenis_produks[$i] }}">
        @endfor --}}
        {{-- @for ($g=0; $g < $jumlah_produk ; $g++)
          @for ($i=0; $i < $jenis_produks[$g]; $i++)
            <div class="w3-card-4">
              <div class="w3-padding">
                <div class="w3-container w3-green">
                  <h5>Data Peserta</h5>
                  <h2> Tiket {{ $nama_produks[$g] }} - {{  $i + 1 }} </h2>
                  <h5> Tiket jenis {{ $g + 1 }} ke {{  $i + 1 }} </h5>
                </div>
                <p>
                  <label>Nama</label>
                  <input class="w3-input" type="text" name="nama{{ $g . $i }}" value="dimas">
                </p>
                <p>
                  <label>Jenis Kelamin</label>
                  <select class="w3-select w3-border" name="jenis_kelamin{{ $g . $i }}">
                    <option value="L">Laki-laki</option>
                    <option value="P">Perempuan</option>
                  </select>
                </p>
                <p>
                  <label>Tanggal Lahir</label>
                  <input class="w3-input" type="date" name="tgl_lahir{{ $g . $i }}" value="">
                </p>
                <p>
                  <label>Nomor KTP</label>
                  <input class="w3-input" type="number" name="no_ktp{{ $g . $i }}" value="63563457356354">
                </p>
                <p>
                  <label>Nomor Telepon</label>
                  <input class="w3-input" type="number" name="tlp{{ $g . $i }}" value="52452346265243">
                </p>
                <p>
                  <label>Email</label>
                  <input class="w3-input" type="email" name="email{{ $g . $i }}" value="fsdfsd@fdf.com">
                </p>
                <p>
                </p>
              </div>
            </div>
            <br>
          @endfor
        @endfor --}}
        <div class="w3-padding">
          <form action="{{ route('Public.Update', ['transaksi_id' => $tickets[0]->transaksi_id]) }}" method="post">
            <input type="hidden" name="transaksi_id" value="{{ $tickets[0]->transaksi_id }}">
        @foreach ($tickets as $tk)
          <input type="hidden" name="tiket_id{{  $loop->iteration }}" value="{{ $tk->id }}">
        <div class="w3-card-4">
          <div class="w3-padding">
            <div class="w3-container w3-green">
              <h5>Data Peserta</h5>
              <h2> Tiket {{ $tk->Produk->nama }} - {{  $loop->iteration }} </h2>
              <h5> No Tiket - {{ $tk->no_tiket }}   </h5>
            </div>
            <p>
              <label>Nama</label>
              <input class="w3-input" type="text" name="nama{{  $loop->iteration }}" value="{{$tk->nama}}">
            </p>
            <p>
              <label>Jenis Kelamin</label>
              <select class="w3-select w3-border" name="jenis_kelamin{{  $loop->iteration }}">
                @if (empty($tk->jenis_kelamin))
                  <option value="" disabled selected>Jenis Kelamin</option>
                @endif
                <option @if ($tk->jenis_kelamin == 'L') selected @endif value="L">Laki-laki</option>
                <option @if ($tk->jenis_kelamin == 'P') selected @endif value="P">Perempuan</option>
                {{-- <option value="L">Laki-laki</option>
                <option value="P">Perempuan</option> --}}
              </select>
              {{-- <select class="w3-select w3-border" name="bank">
                @if (empty(Auth::user()->bank))
                  <option value="" disabled selected>Nama Bank</option>
                @endif
                <option @if (Auth::user()->bank == 'BCA') selected @endif value="BCA">BCA</option>
                <option @if (Auth::user()->bank == 'Mandiri') selected @endif value="Mandiri">Mandiri</option>
                <option @if (Auth::user()->bank == 'Maybank') selected @endif value="Maybank">Maybank</option>
                <option @if (Auth::user()->bank == 'BRI') selected @endif value="BRI">BRI</option>
                <option @if (Auth::user()->bank == 'BNI') selected @endif value="BNI">BNI</option>
              </select> --}}
            </p>
            <p>
              <label>Tanggal Lahir</label>
              <input class="w3-input" type="date" name="tgl_lahir{{  $loop->iteration }}" value="{{ $tk->tgl_lahir }}">
            </p>
            <p>
              <label>Nomor KTP</label>
              <input class="w3-input" type="number" name="no_ktp{{  $loop->iteration }}" value="{{ $tk->no_ktp }}">
            </p>
            <p>
              <label>Nomor Telepon</label>
              <input class="w3-input" type="number" name="tlp{{  $loop->iteration }}" value="{{ $tk->tlp }}">
            </p>
            <p>
              <label>Email</label>
              <input class="w3-input" type="email" name="email{{  $loop->iteration }}" value="{{ $tk->email }}">
            </p>
          </div>
        </div>
        <br>
                @endforeach
        <input type="submit" name="submit" value="Ubah" class="w3-btn w3-orange"></input>
        {{ csrf_field() }}
      </div>



    </form>
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
