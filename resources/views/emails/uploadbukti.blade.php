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
    <h1>Pemesan dengan nomor invoice {{ $transaksi->no_nota }} telah mengupload bukti pembayaran</h1>
    <h2 class="w3-bar-item w3-teal w3-padding"> {{ $transaksi->Acara->nama }}</h2>
    <h2 class="w3-bar-item w3-teal w3-padding"> {{ $transaksi->Acara->tgl_mulai }}</h2>
    <div class="w3-card-4">
      <div class="w3-padding">
        <div class="w3-container w3-blue">
          <h4> SEGERA CEK BUKTI PEMBAYARAN NYA </h4>
        </div>
        <table>
          <tr>
            <td>
              Nama Pemesan
            </td>
            <td>
              {{ $transaksi->nama }}
            </td>
          </tr>
          <tr>
            <td>
              Email
            </td>
            <td>
              {{ $transaksi->email }}
            </td>
          </tr>
          <tr>
            <td>
              Nomor Telepon
            </td>
            <td>
              {{ $transaksi->tlp }}
            </td>
          </tr>
          <tr>
            <td>
              Total yang dibayarkan
            </td>
            <td>
              Rp {{ number_format($transaksi->total,0,"",".") }}
            </td>
          </tr>
          <tr>
            <td>
              Batas Waktu Pembayaran
            </td>
            <td>
              {{ $transaksi->due_at }}
            </td>
          </tr>
          <tr>
            <td>
              Nama Sales
            </td>
            <td>
              {{ $transaksi->User->name }}
            </td>
          </tr>



        </table>
      </div>
    </div>
  </body>
</html>
