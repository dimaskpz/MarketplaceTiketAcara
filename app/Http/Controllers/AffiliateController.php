<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Link;
use App\Transaksi;
use App\Acara;
use App\Tiket;
use App\Produk;
use Auth;
use Illuminate\Support\Facades\DB;
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


    public function show_detail($transaksi_id)
    {
      $transaksi = Transaksi::find($transaksi_id);
      $tikets = Tiket::where('transaksi_id',$transaksi_id)->get();


      $jumlah_eachtiket = DB::table('tikets')
                      ->where('transaksi_id', $transaksi->id)
                      ->select(DB::raw('count(*) as total'))
                      ->groupby('produk_id')
                      ->get();

      $produks = Produk::where('acara_id', $transaksi->acara_id)->orderBy('id', 'ASC')->get();
      $jumlah_produk = $produks->count();
      // JUMLAH tiap jenis produk
      $jenis_produks = array();
      for ($i=0; $i < $jumlah_produk ; $i++) {
        $nama = $i;
        array_push($jenis_produks, $jumlah_eachtiket[$i]->total);
      }

      $harga_produks = array();
      $nama_produks = array();
      $komisi_produks = array();
      foreach ($produks as $produk) {
        array_push($nama_produks, $produk->nama);
        array_push($harga_produks, $produk->harga);
        if ($produk->komisi_jenis == 'tetap') {
          array_push($komisi_produks, $produk->komisi_tetap);
        } else {
          // dd('masih belum tau bener gak nya persenan');
          $hitung_persen = ( $produk->komisi_persen / 100 ) * $produk->harga;
          // dd(
          //   'persen',
          //   $produk->komisi_persen,
          //   'harga jual',
          //   $produk->harga,
          //   'hasil perhitungan',
          //   $hitung_persen
          // );
          array_push($komisi_produks, $hitung_persen);
        }
      }

      $total = 0;
      $total_komisi = 0;
      for ($g=0; $g < $jumlah_produk; $g++) {
        $total = $total + ($harga_produks[$g] * $jenis_produks[$g]);
        $total_komisi = $total_komisi + ($komisi_produks[$g] * $jenis_produks[$g]);
      }

      return view('users.affiliates.show_detail', compact('transaksi', 'tikets'
                                                                        ,'produks', 'jumlah_produk', 'jenis_produks', 'harga_produks', 'nama_produks', 'total'
                                                                        ,'komisi_produks', 'total_komisi'
                                                                      ));
    }









}
