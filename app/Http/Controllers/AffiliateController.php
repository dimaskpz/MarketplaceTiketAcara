<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Link;
use App\Transaksi;
use App\Acara;
use Auth;
class AffiliateController extends Controller
{

    public function index()
    {
      $links = Link::where('user_id',Auth::user()->id)->get();
      // dd($links->toarray());


        return view('users.affiliates.index', compact('links'));
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show($acara_id)
    {
      $transaksis = Transaksi::where('user_id',Auth::user()->id)->where('acara_id', $acara_id)->get();
      $paid_transaksis = Transaksi::where('user_id',Auth::user()->id)->where('acara_id', $acara_id)->where('ispaid','y')->get();
      //OMSET
      $omset = 0;
      foreach($paid_transaksis as $transaksi){
        $omset = $omset + $transaksi->totalOmset;
      }

      //BERSIH
      $bersih = 0;
      foreach ($paid_transaksis as $transaksi) {
        $bersih = $bersih + $transaksi->totalBersih;
      }

      $acara = Acara::find($acara_id);
      $nama_acara = $acara->nama;
      // $transaksis[0]->Acara->nama;
      return view('users.affiliates.show', compact('transaksis', 'nama_acara', 'omset','bersih'));
    }












}
