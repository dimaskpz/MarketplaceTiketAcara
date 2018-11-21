<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>E-Ticket</title>
  </head>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
{{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"> --}}
  <style>
    .row{
      margin:0px;
    }
    h2{
      margin-top:60px;
    }
  </style>

  <body>
    <div class="w3-container w3-blue">
      <h3>E-Ticket</h3>
    </div>
    <button onclick="myFunction()">Print this page</button>

    <div class="w3-padding w3-twothird">

      <br>
      @foreach ($tickets as $ticket)
        <div class="w3-card w3-center">
          <div class="w3-padding">
            <table class="w3-table w3-border ">
              <tr>
                <th class="w3-left">
                  {{ $ticket->Produk->nama }}, Rp {{  number_format($ticket->Produk->harga,0,"",".")}}
                </th>
              </tr>
              <tr>
                <td>
                  <img src="{{ asset('/storage/event/'.$ticket->Produk->Acara->gambar) }}" alt="gambar acara {{(isset($ticket->Produk->Acara->nama)?$ticket->Produk->Acara->nama:'')}}" style="width:100%" class="w3-center ">
                </td>
              </tr>
              <tr>
                <td
                {{-- height="10" --}}
                {{-- class="w3-center"  --}}
                >
                  {!! DNS1D::getBarcodeSVG($ticket->no_tiket, "C128") !!}
                  <br>
                  {{ $ticket->no_tiket }}
                  <br>
                  Tiket ke {{ $loop->iteration }} dari
                  {{  $tickets->count() }} Tiket
                </td>
              </tr>

              <tr>
                <td>
                  {{ $ticket->Transaksi->no_nota }}
                  <br>
                  {{ $ticket->Transaksi->nama }}
                  <br>
                  Dibeli pada
                  {{ $ticket->Transaksi->created_at }}
                </td>
              </tr>
              <tr>
                <td>
                  <b>
                  {{ $ticket->Produk->Acara->nama }}
                </b>
                  <br>
                  {{ $ticket->Produk->Acara->tgl_mulai }} - {{ $ticket->Produk->Acara->tgl_selesai }}
                  <br>
                  {{ $ticket->Produk->Acara->kota }}
                </td>
              </tr>
            </table>


      </div>
    </div>
    <br>
      @endforeach
    </div>


    <script>
    function myFunction() {
        window.print();
    }
    </script>
  </body>
</html>
