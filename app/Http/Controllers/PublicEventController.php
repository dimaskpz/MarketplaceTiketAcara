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
    public function show($link)
    {
      $link_show = Link::where('link',$link)->first();
      $user_id = $link_show->user_id;
      if ($link_show->acara_id) {
          $acara = Acara::find($link_show->acara_id)->first();
      } else {
          // TAMPILKAN ERROR
          // abort ('304');
      }
// GIMANA CARA PENAMAAN BLADE PADA JENIS TIKET
      $produks = Produk::where('acara_id', $link_show->acara_id)->get();
      // dd($produks->toarray());
      return view('users.publics.show', compact('acara','produks','user_id'));
    }

    public function checkout(Request $request)
    {
      // dd($request->toarray());
      // $a = 'jumlah';
      // $b = '2';
      // $c = $a.$b;
      // dd($c);

      // $jumlah_produk = Produk::where('acara_id', $request->acara_id)->count();
      // $a = '';
      // for ($i=1; $i <= $jumlah_produk ; $i++) {
      //     $a = 'jumlah'.$i;
      //     // dd($a);
      //     dd($request->toarray(), $request->.$a);
      // }
      //INPUT BEBERAPA JENIS TIKET MENJADI 1 TRANSAKSI GIMANA CARANYA???????????
      $trans = new Transaksi;
      $trans->user_id = $request->user_id;
      $trans->acara_id = $request->acara_id;
      $trans->save();

      $trans = Transaksi::orderBy('created_at','DESC')->first();
      // dd($trans->toarray());


      return redirect()->route('Public.Event.Personal', ['acara_id'=>$request->acara_id]);
    }

    public function personal($acara_id)
    {
      $peserta = 5;
      //GIMANA CARA BUAT 10 INPUT TIKET DI BLADE
      return view('/users/publics/personal', compact('peserta','acara_id'));
    }

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
