<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Link;
use App\Acara;
use App\Produk;
use App\Transaksi;
use App\Tiket;
use App\User;
use JavaScript;
use Carbon\Carbon;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
class PublicEventController extends Controller
{
  // TAHAP PERTAMA UNTUK MENAMPILKAN DETAIL EVENT
  // HALAMAN 1
    public function show($link)
    {
      //MENCARI DI TABEL LINK ->(acara_id,user_id)
      $link_show = Link::where('link',$link)->first();
      if ($link_show) {
          $user_id = $link_show->user_id;
          $acara_id = $link_show->acara_id;
          $acara = Acara::find($acara_id)->first();
          $produks = Produk::where('acara_id', $acara_id)->get();
          $jumlah_produk = $produks->count();
          return view('users.publics.show', compact('acara','produks','user_id', 'jumlah_produk'));
      } else {
          return abort(404);
        }
    }

    // TAHAP KEDUA SETELAH MEMESAN JUMLAH TIKET PADA JENIS TIKET TERTENTU
    // PROSES PERSIAPAN INPUT DATA PERSONAL PEMBELI Tiket
    // acara_id, user_id, jumlahproduk, tipe'N' (jumlah tiket yg dibeli)
    // "acara_id" => "1"
    // "user_id" => "1"
    // "jumlah_produk" => "3"
    // "tipe1" => "2"
    // "tipe2" => "4"
    // "tipe3" => "2"
    // "_token" => "1JhzkSXGaUdxbfyd7gx2HmbGqptszUQY4zPIOln2"
    // HALAMAN 2
    public function personal(Request $request)
    {
      $user_id = $request->user_id;
      $acara_id = $request->acara_id;
      $produks = Produk::where('acara_id', $acara_id)->orderBy('id', 'ASC')->get();
      $jumlah_produk = $produks->count();
      // JUMLAH tiap jenis produk
      $jenis_produks = array();
      for ($i=0; $i < $jumlah_produk ; $i++) {
        $nama = 'tipe'.$i;
        array_push($jenis_produks, $request->$nama);
      }
      //NAMA & HARGA
      $harga_produks = array();
      $nama_produks = array();
      foreach ($produks as $produk) {
        array_push($nama_produks, $produk->nama);
        array_push($harga_produks, $produk->harga);
      }
      //TOTAL bayar
      $total = 0;
      for ($g=0; $g < $jumlah_produk; $g++) {
        $total = $total + ($harga_produks[$g] * $jenis_produks[$g]);
      }
      //DETAIL acara
      $acara = Acara::find($acara_id)->first();

      return view('/users/publics/personal', compact('total','harga_produks','user_id','acara','nama_produks','jenis_produks','jumlah_produk','produks'));
    }
    // dd(
    //     'request', $request->toarray(),
    //     'jenis_produks = ' , $jenis_produks,
    //     'jumlah_produk = ', $jumlah_produk,
    //     'produks = ', $produks->toarray(),
    //     'nama_produk', $nama_produks
    //     );


    //GIMANA CARA BUAT 10 INPUT TIKET DI BLADE
    //-------------------------------------------------------------------------------------------------------------------
    // HALAMAN KETIGA (TERAKHIR) PEMBAYARAN
    // insert data transaksi, tiket
    // transaksi = data pribadi pembeli
    // tiket = data pribadi peserta tiket
    // HALAMAN 3
    public function store_personal(Request $request)
    {
      $produks = Produk::where('acara_id', $request->acara_id)->orderBy('id', 'ASC')->get();
      $jumlah_produk = $produks->count(); //jumlah jenis produk
      $id_produks = array(); //kode (id)
      $nama_produks = array(); //nama produk
      $harga_produks = array(); //harga
      foreach ($produks as $produk) {
        array_push($id_produks, $produk->id);
        array_push($nama_produks, $produk->nama);
        array_push($harga_produks, $produk->harga);
      }

      //PERULANGAN jumlah tiap jenis tiket
      $jenis_produks = array(); //jumlah pembelian jenis produk
      for ($i=0; $i < $request->jumlah_produk ; $i++) {
        $nama = 'tipe'.$i;
        array_push($jenis_produks, $request->$nama);
      }

      // TOTAL yang dibayar
      $total = 0;
      for ($g=0; $g < $jumlah_produk; $g++) {
        $total = $total + ($harga_produks[$g] * $jenis_produks[$g]);
      }

      //INSERT tabel pertama TRANSAKSI
      $transaksi = new Transaksi;
      $transaksi->no_nota = 'NT'.uniqid();
      $transaksi->user_id = $request->user_id;
      $transaksi->acara_id = $request->acara_id;
      $transaksi->nama = $request->nama_pembeli;
      $transaksi->email = $request->email_pembeli;
      $transaksi->tlp = $request->tlp_pembeli;
      $transaksi->total = $total;
      $transaksi->save();

      // foreignkey
      $last_transaksi = Transaksi::where('nama',$transaksi->nama)
                                      ->where('email',$transaksi->email)
                                      ->orderby('id', 'ASC')
                                      ->get()->last();

      for ($g=0; $g < $request->jumlah_produk ; $g++) {
        for ($i=0; $i < $jenis_produks[$g] ; $i++) {
          $tiket = new Tiket;
          $tiket->no_tiket = uniqid();
          $tiket->transaksi_id = $last_transaksi->id;
          $tiket->produk_id = $id_produks[$g];

          $xnama = 'nama'.$g.$i;
          $xemail = 'email'.$g.$i;
          $xtlp = 'tlp'.$g.$i;
          $xtgl_lahir = 'tgl_lahir'.$g.$i;
          $xjenis_kelamin = 'jenis_kelamin'.$g.$i;
          $xno_ktp = 'no_ktp'.$g.$i;

          $tiket->nama = $request->$xnama;
          $tiket->email = $request->$xemail;
          $tiket->tlp = $request->$xtlp;
          $tiket->tgl_lahir = $request->$xtgl_lahir;
          $tiket->jenis_kelamin = $request->$xjenis_kelamin;
          $tiket->no_ktp = $request->$xno_ktp;
          $tiket->save();
        }
      }

      $acara = Acara::find($request->acara_id);
      $rekening = User::find($acara->user->id);

      date_default_timezone_set('Asia/Jakarta');

      $created_plus = Carbon::parse($last_transaksi->created_at)->addDays(3);
      $countdown = (carbon::now())->diff($created_plus);
      $days= $countdown->days;
      $hours = $countdown->h;
      $minutes = $countdown->m;
      $seconds = $countdown->s;
      JavaScript::put([
          'days' => $days,
          'hours' => $hours,
          'minutes' => $minutes,
          'seconds' => $seconds
      ]);
      return redirect()->route('Public.Event.Trans',['transaksi_id'=>$last_transaksi->no_nota]);
      // return redirect()->route('Event.Ticket.Create', ['id'=>$next->id]);
    }

    public function show_trans($no_nota)
    {
      $transaksi = Transaksi::where('no_nota',$no_nota)->get()->first();
      if ($transaksi) {
        // USER -> nama, nomor rekening
        $rekening = $transaksi->acara->user;
        //COUNTDOWN
        $created_plus = Carbon::parse($transaksi->created_at)->addHours(12);
        $countdown = (carbon::now())->diff($created_plus);
        $days= $countdown->days;
        $hours = $countdown->h;
        $minutes = $countdown->m;
        $seconds = $countdown->s;
        JavaScript::put([
            'days' => $days,
            'hours' => $hours,
            'minutes' => $minutes,
            'seconds' => $seconds
        ]);
        return view('users.publics.done', compact('rekening', 'transaksi'));
      }else {
          return abort(405);
      }
    }

    public function upload(Request $request)
    {
      $this->validate($request,[
        'bukti_img' => 'required|mimes:jpeg,jpg,png|max:10000'
      ]);
      $nama = $request->no_nota.'.jpg'; //nama foto ->$no_nota
      Storage::putFileAs('/public/bukti', new File($request->bukti_img), $nama);

      $xtransaksi = Transaksi::where('no_nota',$request->no_nota)->get()->first();
      // dd($xtransaksi);
      $transaksi = Transaksi::find($xtransaksi->id);
      $transaksi->isupload = 'y';
      $transaksi->save();
      // dd($transaksi->toarray());

      return redirect()->route('Public.Event.Trans',['transaksi_id'=>$request->no_nota]);
    }

    public function cektrans(Request $request)
    {
      $transaksi = Transaksi::where('email', $request->email)->where('no_nota',$request->no_nota)->get()->first();
      if ($transaksi) {
        return redirect()->route('Public.Event.Trans',['transaksi_id'=>$request->no_nota]);
      }else {
        return abort(405);
      }

    }

}
