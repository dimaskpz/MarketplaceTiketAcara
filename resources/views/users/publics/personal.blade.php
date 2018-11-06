@extends('layouts.create_master')
@section('title')
CREATE EVENT
@endsection

@section('content')
  <div class="w3-container w3-blue">
    <h2>PERSONAL INFO</h2>
  </div>

  <div class="w3-padding">
    <form action="{{ route('Event.Public.Store.Personal') }}" method="post">

      <div class="w3-half w3-padding">
        <div class="w3-card-4">
          <div class="w3-padding">
            <div class="w3-container w3-blue">
              <h4> {{  $acara->nama  }}</h4>
            </div>
            <b>Tanggal dan Waktu</b>
            <br>
            {{ $acara->tgl_mulai }} - {{ $acara->tgl_selesai }}
            <br>
            {{ $acara->wkt_mulai }} - {{ $acara->wkt_selesai }}
            <br>
            <b>Lokasi</b>
            <br>
            {{ $acara->nama_tempat }}, {{ $acara->kota }}
            <br>
            {{ $acara->alamat }}
          </div>
        </div>

        <br>
        <div class="w3-card-4">
          <div class="w3-padding">
            <div class="w3-container w3-blue">
              <h2> Pembelian</h2>
            </div>

            <table class="w3-table">
              <tr>
                <th>Tiket</th>
                <th>Jumlah</th>
                <th>Harga</th>
              </tr>
              @for ($g=0; $g < $jumlah_produk ; $g++)

                  <tr>
                    @if ($jenis_produks[$g] != 0)
                      {{-- @else --}}
                        <td>
                          {{ $nama_produks[$g] }}
                        </td>
                        <td>{{ $jenis_produks[$g] }}</td>
                        <td>Rp {{ number_format($harga_produks[$g] * $jenis_produks[$g],0,"",".") }}</td>
                    @endif

                  </tr>

              @endfor


              <tr>
                <td colspan="2">Total Pembayaran</td>

                <td>Rp {{ number_format($total,0,"",".") }}</td>
              </tr>
            </table>
          </div>
        </div>

        <br>
        <div class="w3-card-4">
          <div class="w3-padding">
            <div class="w3-container w3-blue">
              <h2> Data Pembeli</h2>
            </div>
            <input type="hidden" name="acara_id" value="{{ $acara->id }}"></input>
            <input type="hidden" name="jumlah_produk" value="{{ $jumlah_produk }}"></input>
            <input type="hidden" name="user_id" value="{{ $user_id }}">
            <p>
              <label>Nama</label>
              <input class="w3-input" type="text" name="nama_pembeli" value="">
            </p>
            <p>
              <label>Nomor Telepon</label>
              <input class="w3-input" type="number" name="tlp_pembeli" value="">
            </p>
            <p>
              <label>Email</label>
              <input class="w3-input" type="email" name="email_pembeli" value="">
            </p>
          </div>
        </div>
      </div>



      <div class="w3-half w3-padding">
        @for ($i=0; $i < $jumlah_produk; $i++)
          <input type="hidden" name="tipe{{ $i }}" value="{{ $jenis_produks[$i] }}">
        @endfor
        @for ($g=0; $g < $jumlah_produk ; $g++)
          @for ($i=0; $i < $jenis_produks[$g]; $i++)
            <div class="w3-card-4">
              <div class="w3-padding">
                <div class="w3-container w3-blue">
                  <h5>Data Peserta</h5>
                  <h2> Tiket {{ $nama_produks[$g] }} - {{  $i + 1 }} </h2>
                  <h5> Tiket jenis {{ $g + 1 }} ke {{  $i + 1 }} </h5>
                </div>
                <p>
                  <label>TIKET</label>
                  <input class="w3-input" type="text" name="dtransaksi_id" value="tiket_id{{ $g . $i }}">
                  <input disabled class="w3-input" type="text" name="tiket_id{{ $g . $i }}" value="{{ uniqid() }}">
                </p>
                <p>
                  <label>Nama</label>
                  <input class="w3-input" type="text" name="nama{{ $g . $i }}" value="">
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
                  <input class="w3-input" type="number" name="no_ktp{{ $g . $i }}" value="">
                </p>
                <p>
                  <label>Nomor Telepon</label>
                  <input class="w3-input" type="number" name="tlp{{ $g . $i }}" value="">
                </p>
                <p>
                  <label>Email</label>
                  <input class="w3-input" type="email" name="email{{ $g . $i }}" value="">
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
