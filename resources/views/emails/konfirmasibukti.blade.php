<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
    html,body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
    </style>
  </head>
  <body>
    <h1>Pembayaranmu telah dikonfirmasi</h1>
    <h3>E-Tiket mu telah valid!!! yeeyy!!!</h3>
    {{-- <h2 class="w3-bar-item w3-teal w3-padding"> {{ $transaksi->Acara->nama }}</h2> --}}

    {{-- <div class="w3-card-4">
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
              {{ $transaksi->User->nama_rekening }}
            </td>
          </tr>
          <tr>
            <td>
              Nomor Rekening
            </td>
            <td>{{ $transaksi->User->no_rekening }}</td>
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
    </div> --}}
  </body>
</html>
