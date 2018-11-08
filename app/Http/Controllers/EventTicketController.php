<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produk;
use App\Acara;

class EventTicketController extends Controller
{
    public function create($id)
    {
      $produks =Produk::where('acara_id',$id)->get();
      if(!$produks){
        return view('users.events.tickets.create', compact('id'));
      }
      return view('users.events.tickets.create', compact('id','produks'));
    }

    public function store(Request $request, $id)
    {
      // dd($id);
      $acara = Acara::find($id);

      if (!$acara) {
        return redirect()->back();
      }
      // dd($request->toarray());
      $produk = new Produk;
      $produk->acara_id = $id;
      $produk->nama = $request->nama;
      $produk->harga = $request->harga;
      $produk->jumlah = $request->jumlah;
      $produk->deskripsi = $request->deskripsi;
      $produk->tgl_selesai = $request->tgl_selesai;
      if ($request->komisi_tetap) {
        // dd('ada komisi_tetap');
        $produk->komisi_jenis = 'tetap';
        $produk->komisi_tetap = $request->komisi_tetap;
      }else {
        $produk->komisi_jenis = 'persen';
        $produk->komisi_persen = $request->komisi_persen;
      }

      $produk->save();

      return redirect()->route('Event.Ticket.Create',['id'=>$id]);
    }

    public function edit($produk_id)
    {
      $produk = Produk::find($produk_id);
      $acara_id = $produk->Acara->id;
      // dd($acara_id);
      return view('users.events.tickets.edit', compact('produk'));
    }

    public function update(Request $request, $id)
    {
      $produk = Produk::find($id);


      $produk->nama = $request->nama;
      $produk->harga = $request->harga;
      $produk->jumlah = $request->jumlah;
      $produk->deskripsi = $request->deskripsi;
      $produk->tgl_selesai = $request->tgl_selesai;
      if ($request->komisi_tetap) {
        $produk->komisi_jenis = 'tetap';
        $produk->komisi_tetap = $request->komisi_tetap;
      }else {
        $produk->komisi_jenis = 'persen';
        $produk->komisi_persen = $request->komisi_persen;
      }
      $produk->save();

      return redirect()->route('Event.Ticket.Create', ['id'=>$produk->acara_id]);
    }
}
