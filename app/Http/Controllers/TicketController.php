<?php

namespace App\Http\Controllers;
use App\Tiket;
use App\Transaksi;
use App\Produk;
use App\Acara;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transaksis = Transaksi::where('email',Auth::user()->email)->get();
        return view('users.tickets.index', compact('transaksis'));
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show($transaksi_id)
    {

      $transaksi = Transaksi::find($transaksi_id);
      $acara = Acara::find($transaksi->acara_id);
      $tikets = Tiket::where('transaksi_id', $transaksi_id)->orderBy('produk_id','asc')->get();
      $produks = Produk::where('acara_id', $transaksi->acara_id)->orderBy('id', 'ASC')->get();
      $jumlah_produk = $produks->count();
      $jenis_produks = array();
      foreach ($produks as $produk) {
        array_push($jenis_produks, $produk->Tiket->where('transaksi_id',$transaksi->id)->count());
      }
      $harga_produks = array();
      $nama_produks = array();
      foreach ($produks as $produk) {
        array_push($nama_produks, $produk->nama);
        array_push($harga_produks, $produk->harga);
      }
      $total = 0;
      for ($g=0; $g < $jumlah_produk; $g++) {
        $total = $total + ($harga_produks[$g] * $jenis_produks[$g]);
      }
        return view('users.tickets.show', compact('transaksi','jenis_produks', 'harga_produks', 'nama_produks', 'jumlah_produk', 'total', 'acara', 'tikets'));
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
