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
      // dd($produks);
      return view('users.events.tickets.create', compact('id','produks'));
    }

    public function store(Request $request, $id)
    {
      // dd($id);
      $acara = Acara::find($id);

      if (!$acara) {
        return redirect()->back();
      }

      $produk = new Produk;
      $produk->acara_id = $id;
      $produk->nama = $request->nama;
      $produk->harga = $request->harga;
      $produk->jumlah = $request->jumlah;
      $produk->deskripsi = $request->deskripsi;
      $produk->tgl_mulai = $request->tgl_mulai;
      $produk->tgl_selesai = $request->tgl_selesai;
      $produk->komisi_awal = $request->komisi_awal;
      $produk->tipe_komisi = $request->tipe_komisi;
      $produk->komisi_tambah = $request->komisi_tambah;
      $produk->max_kelipatan = $request->max_kelipatan;
      $produk->kelipatan = $request->kelipatan;

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
}
