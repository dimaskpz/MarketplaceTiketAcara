@extends('layouts.create_master')
@section('title')
Edit Tiket
@endsection

@section('content')
  <div class="w3-container w3-teal">
  <h2>Viho System</h2>
</div>
<div class="w3-padding">


  <div class="w3-half w3-padding">
    <div class="w3-card-4">
      <div class="w3-container w3-teal">
        <h2>Ubah Tiket</h2>
      </div>
      <form class="w3-container" action="{{ route('Event.Ticket.Update', ['id'=>$produk->id]) }}" method="post">
        <div class="w3-half w3-padding">
          <p>
          <label>Nama Tiket</label>
          <input required class="w3-input w3-border w3-sand" type="text" name="nama" value="{{ $produk->nama }}"></p>
          <p>
          <label>Harga</label>
          <input class="w3-input w3-border w3-sand" type="number" name="harga" value="{{ $produk->harga }}"></p>
          <p>
          <label>Jumlah</label>
          <input required class="w3-input w3-border w3-sand" type="number" name="jumlah" value="{{ $produk->jumlah }}"></p>
          <p>
          <label>Deskripsi</label>
          <input class="w3-input w3-border w3-sand" type="text" name="deskripsi" value="{{ $produk->deskripsi }}"></p>
          <p>
          <label>Tanggal Selesai</label>
          <input min="{{date('Y-m-d')}}" max="{{ $acara->tgl_mulai }}" required class="w3-input w3-border w3-sand" type="date" name="tgl_selesai" value="{{ $produk->tgl_selesai }}"></p>


        </div>

        <div class="w3-half w3-padding">
          <p>
            <input {{ $produk->komisi_jenis === 'tetap'?"checked='true'":'' }} class="w3-radio" onclick="komisi()" id="radio_tetap" type="radio" name="rkomisi" value="tetap">
            <label>
              Komisi Tetap
            </label>
          </p>
          <p>
            <input {{ $produk->komisi_jenis === 'tetap'?'':"checked='true'" }} class="w3-radio" onclick="komisi()" type="radio" name="rkomisi" value="persen">
            <label>
              Komisi Persen
            </label>
          </p>

        <br>

        <p>
          <label>Komisi Tetap</label>
          <input required {{ $produk->komisi_jenis === 'tetap'?'':'disabled' }} id="input_tetap" class="w3-input w3-border" type="number" name="komisi_tetap" value="{{ isset($produk->komisi_tetap)?$produk->komisi_tetap:''}}" placeholder="Komisi Tetap">
        </p>
        <p>
          <label>Prosentase Komisi</label>
          <input required {{ $produk->komisi_jenis === 'tetap'?'disabled':'' }} id="input_persen" class="w3-input w3-border" type="number" name="komisi_persen" value="{{ isset($produk->komisi_persen)?$produk->komisi_persen:''}}" placeholder="Komisi Persen" max="100"><br>
        </p>

          <input type="submit" class="w3-btn w3-brown" value="Simpan Perubahan"></input>
          {{ csrf_field() }}
          <input type="hidden" name="_method" value="PUT">
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
<script>
  window.komisi = function() {
    if(document.getElementById("radio_tetap").checked) {
      document.getElementById("input_tetap").disabled = false;
      document.getElementById("input_persen").disabled = true;
    } else {
      document.getElementById("input_tetap").disabled = true;
      document.getElementById("input_persen").disabled = false;
    }
  }

</script>
@endsection
