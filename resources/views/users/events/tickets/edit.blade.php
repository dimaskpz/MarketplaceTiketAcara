@extends('layouts.create_master')
@section('title')
Edit Tiket
@endsection

@section('content')
  <div class="w3-container w3-teal">
  <h2>Edit Tiket</h2>
</div>
<div class="w3-padding">


  <div class="w3-half w3-padding">
    <div class="w3-card-4">
      <div class="w3-container w3-teal">
        <h2>Tiket</h2>
      </div>
      <form class="w3-container" action="{{ route('Event.Ticket.Update') }}" method="post">
        <div class="w3-half w3-padding">
          <p>
          <label>Nama Tiket</label>
          <input required class="w3-input w3-border w3-sand" type="text" name="nama" value="{{ $produk->nama }}"></p>
          <p>
          <label>Harga</label>
          <input class="w3-input w3-border w3-sand" type="text" name="harga" value="{{ $produk->harga }}"></p>
          <p>
          <label>Jumlah</label>
          <input required class="w3-input w3-border w3-sand" type="text" name="jumlah" value="{{ $produk->jumlah }}"></p>
          <p>
          <label>Deskripsi</label>
          <input class="w3-input w3-border w3-sand" type="text" name="deskripsi" value="{{ $produk->deskripsi }}"></p>
          <p>
          <label>Tanggal Mulai</label>
          <input required min="{{date('Y-m-d')}}" class="w3-input w3-border w3-sand" type="date" name="tgl_mulai" value="{{ $produk->tgl_mulai }}"></p>
          <p>
          <label>Tanggal Selesai</label>
          <input required min="{{date('Y-m-d')}}" class="w3-input w3-border w3-sand" type="date" name="tgl_selesai" value="{{ $produk->tgl_selesai }}"></p>
          <p>
        </div>

        <div class="w3-half w3-padding">
          <p>
          <label>Komisi Awal</label>
          <input class="w3-input w3-border w3-sand" type="text" name="komisi_awal" value="{{ $produk->komisi_awal }}"></p>
          <p>
          <label>Tipe Komisi</label>
          <input class="w3-input w3-border w3-sand" type="text" name="tipe_komisi" value="{{ $produk->tipe_komisi }}"></p>
          <p>
          <label>Komisi Tambah</label>
          <input class="w3-input w3-border w3-sand" type="text" name="komisi_tambah" value="{{ $produk->komisi_tambah }}"></p>
          <p>
          <label>Maks_kelipatan</label>
          <input class="w3-input w3-border w3-sand" type="text" name="max_kelipatan" value="{{ $produk->max_kelipatan }}"></p>
          <p>
          <label>Kelipatan</label>
          <input class="w3-input w3-border w3-sand" type="text" name="kelipatan" value="{{ $produk->kelipatan }}"></p>

          <button class="w3-btn w3-brown">Ubah Tiket</button>
          {{ csrf_field() }}
            <a href="{{ url()->previous() }}" class="w3-button w3-block w3-black w3-section w3-padding">Kembali</a>
        </div>

      </form>
    </div>




</div>



{{-- <div class="w3-hal w3-padding">
  <div class="w3-card-4">
    <div class="w3-container city" >
        <p>
        <div class="w3-responsive">
          <table class="w3-table-all">
            <tr>
              <th>Nama Tiket</th>
              <th>Harga</th>
              <th>Jumlah</th>
              <th>Tanggal Mulai</th>
              <th>Tanggal Selesai</th>
              <th>Komisi Awal</th>
              <th>Tipe Komisi</th>
              <th>Komisi Tambah</th>
              <th>Kelipatan</th>
            </tr>
            @if ($produks)
              @foreach ($produks as $p)
                <tr>
                  <td>{{ $p->nama }}</td>
                  <td>{{ $p->harga }}</td>
                  <td>{{ $p->jumlah }}</td>
                  <td>{{ $p->tgl_mulai }}</td>
                  <td>{{ $p->tgl_selesai }}</td>
                  <td>{{ $p->komisi_awal }}</td>
                  <td>{{ $p->tipe_komisi }}</td>
                  <td>{{ $p->komisi_tambah }}</td>
                  <td>{{ $p->kelipatan }}</td>
                  <td> <a href="#" class="w3-btn w3-teal">Edit</a> <a href="#" class="w3-btn w3-red" >Delete</a> </td>

                </tr>
              @endforeach
            @endif

          </table>
        </div>
        </p>
    </div>
  </div>
</div> --}}

</div>
@endsection
