<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Link;
use App\Acara;
use App\Produk;
use App\Transaksi;
use App\Tiket;
class PublicEventController extends Controller
{
  // TAHAP PERTAMA UNTUK MENAMPILKAN DETAIL EVENT
    public function show($link)
    {
      //MENCARI DI TABEL LINK ->(acara_id,user_id)
      $link_show = Link::where('link',$link)->first();
      // dd($link_show->toarray());
      if ($link_show->acara_id) {
          $user_id = $link_show->user_id;
          $acara_id = $link_show->acara_id;
          $acara = Acara::find($acara_id)->first();
          $produks = Produk::where('acara_id', $acara_id)->get();
          $jumlah_produk = $produks->count();
          return view('users.publics.show', compact('acara','produks','user_id', 'jumlah_produk'));
      } else {
          // TAMPILKAN ERROR
          // abort ('304');
          // return ERROR
      }

      // GIMANA CARA PENAMAAN BLADE PADA JENIS TIKET

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
    public function personal(Request $request)
    {
      // dd($request->toarray());

      $user_id = $request->user_id;
      $acara_id = $request->acara_id;
      $jumlah_produk = $request->jumlah_produk;
      $jenis_produks = array();
      for ($i=0; $i < $jumlah_produk ; $i++) {
        $nama = 'tipe'.$i;
        array_push($jenis_produks, $request->$nama);
      }
      // dd($jenis_produks[2]);
      $acara = Acara::find($acara_id)->first();
      $produks = Produk::where('acara_id', $acara_id)->orderBy('id', 'ASC')->get();

      $nama_produks = array();
      foreach ($produks as $produk) {
        array_push($nama_produks, $produk->nama);
      }

      // dd(
      //     'jenis produk = ' , $jenis_produks,
      //     'jumlah produk = ', $jumlah_produk,
      //     'produks = ', $produks,
      //     'nama produk', $nama_produks
      //     );
      // dd($produks=>['nama']);
      // dd($produks);

      //GIMANA CARA BUAT 10 INPUT TIKET DI BLADE
      return view('/users/publics/personal', compact('acara','nama_produks','jenis_produks','jumlah_produk'));
    }

    // HALAMAN KETIGA (TERAKHIR) PEMBAYARAN
    // insert data transaksi, tiket
    // transaksi = data pribadi pembeli
    // tiket = data pribadi peserta tiket

    public function store_personal(Request $request)
    {
      // dd($request);
      $tiket = new Tiket;
      $tiket->dtransaksi_id = $request->dtransaksi_id;
      $tiket->nama = $request->nama;
      $tiket->email = $request->email;
      $tiket->tlp = $request->tlp;
      $tiket->tgl_lahir = $request->tgl_lahir;
      $tiket->jenis_kelamin = $request->jenis_kelamin;
      $tiket->no_ktp = $request->no_ktp;
      $tiket->save();
      // dd('sdads');
      return redirect()->route('Public.Event.Done',['acara_id'=>$request->acara_id]);
    }

    public function done($acara_id)
    {

      // $a='dd';
      // dd($a);
      // JUMLAH YG HARUS DIBAYARKAN
      // NAMA DAN NOMOR REKENING TUJUAN PERUSAHAAN
      // NOMOR INVOICE

      return view('users.publics.done');
    }
}
