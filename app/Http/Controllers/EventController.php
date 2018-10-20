<?php

namespace App\Http\Controllers;
use App\Acara;
use App\Link;
Use App\Transaksi;
// Use App\Dtransaksi;
Use App\Produk;
Use App\User;
Use App\Tiket;
use Illuminate\Http\Request;
use Auth;

class EventController extends Controller
{

    public function index()
    {
        $acaras = Acara::where('user_id', Auth::user()->id)->get();
        // dd($acara->toarray());
        // dd($acara);
        // dd(Auth::user( )->id);
        return view('users.events.index', compact('acaras'));
    }


    public function create()
    {

        return view('users.events.create');
    }


    public function store(Request $request)
    {
        //PROSES PENYIMPANAN Gambar



        $acara = new Acara;
        $a = Auth::user()->id;

        $acara->user_id = Auth::user()->id;
        $acara->gambar = $request->gambar;
        $acara->nama = $request->nama;
        $acara->nama_tempat = $request->nama_tempat;
        $acara->kota = $request->kota;
        $acara->alamat = $request->alamat;
        $acara->kapasitas = $request->kapasitas;
        $acara->deskripsi = $request->deskripsi;

        $acara->tgl_mulai = $request->tgl_mulai;
        $acara->tgl_selesai = $request->tgl_selesai;
        $acara->wkt_mulai = $request->wkt_selesai;
        $acara->wkt_selesai = $request->wkt_selesai;
        $acara->save();

        $next = Acara::all()->last();

        return redirect()->route('Event.Ticket.Create', ['id'=>$next->id]);
    }


    public function show($id)
    {
        $acara = Acara::find($id);
        return view('users.events.show', compact('acara'));
    }


    public function edit($id)
    {
        $acara = Acara::find($id);
        return view('users.events.edit', compact('acara'));
    }


    public function update(Request $request, $id)
    {

        //PROSES PENYIMPANAN Gambar


        $acara = Acara::find($id);

        $acara->gambar = $request->gambar;
        $acara->nama = $request->nama;
        $acara->nama_tempat = $request->nama_tempat;
        $acara->kota = $request->kota;
        $acara->alamat = $request->alamat;
        $acara->kapasitas = $request->kapasitas;
        $acara->deskripsi = $request->deskripsi;

        $acara->tgl_mulai = $request->tgl_mulai;
        $acara->tgl_selesai = $request->tgl_selesai;
        $acara->wkt_mulai = $request->wkt_selesai;
        $acara->wkt_selesai = $request->wkt_selesai;
        $acara->save();

        return redirect()->route('Event.Show',['id'=>$acara->id]);
    }


    public function destroy($id)
    {
        //
    }


    public function penjualan($id)
    {
      $acara = Acara::find($id);
      $produks = Produk::where('acara_id', $id)->get();
      return view('users.events.penjualan.index', compact('acara','produks'));
    }

    public function pemesan($id)
    {
      $acara = Acara::find($id);
      $pemesans = Transaksi::where('acara_id',$id)->get();
      // ->get();
// $p->link->user->name
      // dd($pemesans->toarray());
     //  dd('pemesan pertama = ' ,$pemesans->toarray(),
     //   'user id =', $pemesans->user_id,
     //   'nama user = ', $pemesans->user->name
     // );
      return view('users.events.pemesan.index', compact('acara','pemesans'));
    }

    public function pemesan_show($transaksi_id)
    {
      $transaksi = Transaksi::find($transaksi_id);
      // $dtrans = Dtransaksi::where('transaksi_id',$transaksi_id)->get();

      $acara = Acara::find($transaksi->acara_id);
      $tikets = Tiket::where('transaksi_id', $transaksi_id)->orderBy('produk_id','asc')->get();
      // dd($tikets->toarray());
      $total =0;
      foreach ($tikets as $t) {
        $total = $total + $t->Produk->harga;
      }

      return view('users.events.pemesan.show', compact('transaksi', 'acara','total', 'tikets'));
    }

    public function konfirmasi($transaksi_id)
    {
      $transaksi = Transaksi::find($transaksi_id);
      $transaksi->ispaid = 'y';
      $transaksi->save();

      return redirect()->route('Event.Pemesan.Show',['id'=>$transaksi_id]);
    }

    public function checkin($id, Request $request)
    {
      $acara = Acara::find($id);
      $transaksis = Transaksi::where('acara_id',$id)->where('ispaid','y')->get();

      $transaksi_id = $request->transaksi_id;
       dd($transaksi_id);
      if ($transaksi_id) {
      $tikets = Tiket::where('transaksi_id',$transaksi_id)->orderBy('produk_id','asc')->get();
      // dd($tikets->toarray());
      return view('users.events.checkin.index', compact('acara','transaksis','id','tikets'));
      }

      return view('users.events.checkin.index', compact('acara','transaksis','id'));
    }

    public function checkin_update(Request $request, $tiket_id)
    {
      $tiket = Tiket::find($tiket_id);
      $tiket->ischeckin = 'y';
      $tiket->save();

      $acara_id = $tiket->Transaksi->acara_id;
      $transaksi_id = $tiket->transaksi_id;
      dd('acara_id', $acara_id, 'transaksi_id', $transaksi_id);
      return redirect()->route('Event.Checkin',['id'=>$acara_id])->with(compact('transaksi_id'));
    }

    public function sales($id)
    {
      $acara = Acara::find($id);
      $saless = Link::where('acara_id',$id)->get();
      // dd($saless->toarray());
      return view('users.events.sales.index', compact('acara', 'saless'));
    }
}
