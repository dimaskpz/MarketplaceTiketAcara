@extends('layouts.create_master')
@section('title')
Viho System
@endsection

@section('content')
  <div class="w3-container w3-blue">
    <h2>Pembayaran</h2>
  </div>

  <div class="w3-padding">
    <div class="w3-half w3-padding">
      <div class="w3-card-4">
        <div class="w3-padding">
          <div class="w3-container w3-blue">
            <h4> SEGERA LAKUKAN PEMBAYARAN </h4>
          </div>
          <table>
            <tr>
              <td>
                Nama Rekening
              </td>
              <td>
                {{ $rekening->nama_rekening }}
              </td>
            </tr>
            <tr>
              <td>
                Nomor Rekening
              </td>
              <td>{{ $rekening->no_rekening }}</td>
            </tr>
            <tr>
              <td>
                Jumlah Tagihan
              </td>
              <td>
                Rp {{ number_format($transaksi->total,0,"",".") }}
              </td>
            </tr>

            <tr>
              <td>
                Nomor Invoice
              </td>
              <td>{{ $transaksi->no_nota }}</td>
            </tr>

          </table>
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

  <div class="w3-padding">
    <a class="w3-btn w3-black" href="{{ route('Welcome') }}">Kembali ke Halaman Utama</a>

</div>
    </div>

  <div class="w3-half w3-padding">
    <div class="w3-card-4">
      <div class="w3-padding">
        <div class="w3-container w3-blue">
          <h6>Harap melakukan pembayaran dalam waktu yang ditentukan</h6>
        </div>
        <table>
          <tr>
            <td>
              <div id="countdown"></div>
            </td>
          </tr>
        </table>
      </div>
    </div>
  </div>

  <div class="w3-half w3-padding">
    <div class="w3-card-4">
      <div class="w3-padding">
        <div class="w3-container w3-blue">
          <h6>Upload Bukti Pembayaran</h6>
        </div>
        <table>
          <form enctype="multipart/form-data" action="{{ route('Public.Upload') }}" method="POST">
            <input type="hidden" name="no_nota" value="{{ $transaksi->no_nota }}">
          <tr>
            <td>
                <input required class="w3-input" type="file" name="bukti_img"></input>
            </td>
            <td>
              <input class="w3-block w3-blue " type="submit" name="submit" value="Upload"></input>
              {{ csrf_field() }}
            </td>
          </tr>
        </form>
        </table>
        @if ($errors->has('bukti_img'))
          <p> {{ $errors->first('bukti_img') }} </p>
        @endif

        <div class="w3-card-4 w3-teal" style="width:75%">
          @if ($transaksi->isupload == 'y')
            Tunggu konfirmasi pembayaran dari admin kami.
            <img src="{{ url('/storage/bukti/'.$transaksi->no_nota.'.jpg') }}" alt="asdfa" style="width:100%">
          @endif
          {{-- <div class="w3-container w3-center">
            <p> {{ $acara->nama }} </p>
          </div> --}}
        </div>
      </div>
    </div>
  </div>


</div>
  @include('js.value')



  <script>
  // var days=1,hours=0,minutes=0,seconds=7;
  console.log(days);
  console.log(hours);
  console.log(minutes);
  console.log(seconds);

  var container = document.getElementById("countdown");
  function countdown(){
    if (seconds == 0 && minutes == 0 && hours == 0 && days == 0) {
      // STOP
      container.innerHTML = "Waktu Habis"
    } else {
      if(seconds == 0){
        seconds = 59;
        minutes--;
      }else{
        seconds--;
      }
      if(minutes == -1){
        minutes = 59;
        hours--;
      }
      if(hours == -1){
        hours = 23
        days--;
      }


      container.innerHTML = "hari:"+days+", jam:"+hours+", menit:"+minutes+", detik:"+seconds;
      setTimeout(countdown,1000);
    }
  }
  countdown();




  </script>

@endsection
