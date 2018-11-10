@extends('layouts.create_master')
@section('title')
  TIKET
@endsection

@section('content')
  <div class="w3-container w3-teal">
    <h2>Pengaturan Tiket</h2>
  </div>
  <div class="w3-padding-row">


    <div class="w3-half w3-padding">
      <div class="w3-card-4">
        <div class="w3-container w3-teal">
          <h2>Buat Jenis Tiket Baru</h2>
        </div>

        <form class="w3-container" action="{{ route('Event.Ticket.Store',['id'=>$id]) }}" method="post">
          <div class="w3-padding w3-half">
            <p>
              <label>Nama Tiket</label>
              <input required class="w3-input w3-border w3-sand" type="text" name="nama" >
            </p>
            <p>
              <label>Harga</label>
              <input required class="w3-input w3-border w3-sand" type="text" name="harga">
            </p>
            <p>
              <label>Jumlah</label>
              <input required class="w3-input w3-border w3-sand" type="number" name="jumlah">
            </p>
            <p>
              <label>Deskripsi</label>
              <input class="w3-input w3-border w3-sand" type="text" name="deskripsi">
            </p>

            <p>
              <label>Tanggal Selesai</label>
              <input required min="{{date('Y-m-d')}}" class="w3-input w3-border w3-sand" type="date" name="tgl_selesai">
            </p>


          </div>

          <div class="w3-half w3-padding">

              <p>
                <input checked class="w3-radio" onclick="komisi()" id="radio_tetap" type="radio" name="rkomisi" value="tetap">
                <label>
                  Komisi Tetap
                </label>
              </p>
              <p>
                <input class="w3-radio" onclick="komisi()" type="radio" name="rkomisi" value="persen">
                <label>
                  Komisi Persen
                </label>
              </p>

            <br>

            <p>
              <label>Komisi Tetap</label>
              <input required id="input_tetap" class="w3-input w3-border" type="number" name="komisi_tetap" value="" placeholder="Komisi Tetap">
            </p>
            <p>
              <label>Prosentase Komisi</label>
              <input required disabled id="input_persen" class="w3-input w3-border" type="number" name="komisi_persen" value="" placeholder="Komisi Persen" max="100"><br>
            </p>
            <button class="w3-btn w3-brown">Tambah Tiket</button>
            {{ csrf_field() }}
          </div>

        </form>
      </div>
    </div>



    <div class="w3-half w3-padding">
      <div class="w3-card-4">
        <div class="w3-container w3-teal">
          <h2>Jenis Tiket</h2>
        </div>
        <div class="w3-container city" >
          <p>
            <div class="w3-responsive">
              <table class="w3-table-all">
                <tr>
                  <th>Tiket</th>
                  <th>Harga</th>
                  <th>Jml</th>
                  <th>Tgl Selesai</th>
                  <th>Komisi Sales</th>
                  <th>Komisi Prosentase</th>
                </tr>
                @if ($produks)
                  @foreach ($produks as $p)
                    <tr>
                      <td>{{ $p->nama }}</td>
                      {{-- <td>{{ $p->harga }}</td> --}}
                      <td> Rp {{ number_format($p->harga,0,"",".")  }}</td>
                      <td>{{ $p->jumlah }}</td>
                      <td>{{ $p->tgl_selesai }}</td>
                      @if ($p->komisi_jenis == 'tetap')
                        <td> Rp {{ number_format($p->komisi_tetap,0,"",".")  }}</td>
                        {{-- Rp {{ number_format($total,0,"",".") }} --}}
                      @else
                        <td> Rp {{ number_format( ($p->komisi_persen / 100) * $p->harga ,0,"",".")}} <br>({{ $p->komisi_persen }} %)</td>
                      @endif
                      <td> <a href="{{ route('Event.Ticket.Edit',['id'=>$p->id]) }}" class="w3-btn w3-teal">Edit</a>  </td>
                    </tr>
                  @endforeach
                @endif
              </table>
            </div>
          </p>
        </div>
      </div>
    </div>


    <div class="w3-half w3-padding">
      <div class="w3-card-4">
        <a class="w3-btn w3-black w3-left" href="{{ route('Event.Show',['id'=>$id]) }}">Selesai</a>
      </div>
    </div>

    {{--  --}}
  </div>


  {{--  --}}
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
  {{--  --}}
@endsection
