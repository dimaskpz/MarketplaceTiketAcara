<?php

namespace App\Http\Controllers;
use App\Acara;
use App\Link;
Use App\Transaksi;
Use App\Produk;
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
        // $acara = 'testingfsdasfasdfadf';
        // dd($acara);
        return view('users.events.create');
    }


    public function store(Request $request)
    {
        // dd($request->toarray());
        // dd($request->gambar);
        $acara = new Acara;
        $a = Auth::user()->id;
        // dd($a->id);
        // dd($a);

        $acara->gambar = $request->gambar;
        $acara->user_id = Auth::user()->id;
        $acara->nama = $request->nama;
        $acara->kapasitas = $request->kapasitas;
        $acara->jenis_acara = $request->kapasitas;
        $acara->lokasi = $request->lokasi;
        $acara->tgl_mulai = $request->tgl_mulai;
        $acara->tgl_selesai = $request->tgl_selesai;
        $acara->wkt_mulai = $request->wkt_selesai;
        $acara->wkt_selesai = $request->wkt_selesai;
        $acara->deskripsi = $request->deskripsi;
        $acara->save();

        $next = Acara::all()->last();
        // dd($next->toarray() );
        return redirect()->route('Event.Show',['id'=>$next->id]);
    }


    public function show($id)
    {
        $acara = Acara::find($id);
        // dd($acara->toarray());
        // $id = $acara->id;
        return view('users.events.show', compact('acara'));
    }


    public function edit($id)
    {
        $acara = Acara::find($id);
        return view('users.events.create', compact('acara'));
    }


    public function update(Request $request, $id)
    {
        //
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

      // dd($pemesans->toarray());
     //  dd('pemesan pertama = ' ,$pemesans->toarray(),
     //   'user id =', $pemesans->link->user_id,
     //   'nama user = ', $pemesans->link->user->name
     // );
      return view('users.events.pemesan.index', compact('acara','pemesans'));
    }

    public function checkin($id)
    {
      $acara = Acara::find($id);
      $transaksis = Transaksi::where('acara_id',$id)->where('ispaid','y')->get();
      return view('users.events.checkin.index', compact('acara','transaksis'));
    }

    public function sales($id)
    {
      $acara = Acara::find($id);
      $saless = Link::where('acara_id',$id)->get();
      // dd($saless->toarray());
      return view('users.events.sales.index', compact('acara', 'saless'));
    }
}
