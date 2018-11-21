<?php

namespace App\Http\Controllers;
use App\Acara;
use App\Link;
Use App\Transaksi;
Use App\Produk;
Use App\User;
Use App\Tiket;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\KonfirmasiBukti;
use App\Mail\KonfirmasiBuktitoSales;
class EventController extends Controller
{
    public function index()
    {
        // dd(date("Y-m-d"));
        // dd($acaras->toarray());
        // $acaras = Acara::where('user_id', Auth::user()->id)->where('tgl_mulai','>=',(date("Y-m-d")))->get();
        // $acaras_lalu = Acara::where('user_id', Auth::user()->id)->where('tgl_mulai','<',(date("Y-m-d")))->get();
        $acaras = Acara::where('user_id', Auth::user()->id)->get();
        $acaras_lalu = array();
        return view('users.events.index', compact('acaras', 'acaras_lalu'));
    }

    public function sales_show(Request $request)
    {
      // dd('wqrqwerqewr');
      $user_id = $request->user_id;
      $acara_id = $request->acara_id;
      // dd($user_id,$acara_id);
      $transaksis = Transaksi::where('user_id',$user_id)->where('acara_id', $acara_id)->get();
      // dd($transaksis->toarray());
      $paid_transaksis = Transaksi::where('user_id',$user_id)->where('acara_id', $acara_id)->where('ispaid','y')->get();
      $omset = 0;
      foreach($paid_transaksis as $transaksi){
        $omset = $omset + $transaksi->totalOmset;
      }
      $bersih = 0;
      foreach ($paid_transaksis as $transaksi) {
        $bersih = $bersih + $transaksi->totalBersih;
      }
      $acara = Acara::find($acara_id);
      $nama_acara = $acara->nama;
      // dd($nama_acara);

      return view('users.events.sales.show'
                              , compact('transaksis', 'nama_acara','acara', 'omset','bersih', 'acara_id', 'user_id')
                                );
    }

    public function sales_show_detail(Request $request)
    {
      // $acara_id = $request->acara_id;
      // $user_id = $request->user_id;
      $transaksi_id = $request->transaksi_id;

      $transaksi = Transaksi::find($transaksi_id);
      $tikets = Tiket::where('transaksi_id',$transaksi_id)->get();
      $produks = Produk::where('acara_id', $transaksi->acara_id)->orderBy('id', 'ASC')->get();
      $jumlah_produk = $produks->count();
      $jenis_produks = array();
      foreach ($produks as $produk) {
        array_push($jenis_produks, $produk->Tiket->where('transaksi_id',$transaksi->id)->count());
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
          $hitung_persen = ( $produk->komisi_persen / 100 ) * $produk->harga;
          array_push($komisi_produks, $hitung_persen);
        }
      }
      $total = 0;
      $total_komisi = 0;
      for ($g=0; $g < $jumlah_produk; $g++) {
        $total = $total + ($harga_produks[$g] * $jenis_produks[$g]);
        $total_komisi = $total_komisi + ($komisi_produks[$g] * $jenis_produks[$g]);
      }

      $acara = Acara::find($transaksi->acara_id);

      return view('users.events.sales.show_detail'
                                , compact('acara','transaksi', 'tikets','produks', 'jumlah_produk', 'jenis_produks', 'harga_produks', 'nama_produks', 'total','komisi_produks', 'total_komisi')
                                );
    }

    public function create()
    {
        return view('users.events.create');
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

    public function store(Request $request)
    {
        $this->validate($request,[
          'event_img' => 'mimes:jpeg,jpg,png|max:10000',
          'nama' => 'required'
        ]);

          $acara = new Acara;
          $a = Auth::user()->id;
          $acara->user_id = Auth::user()->id;
          $acara->nama = $request->nama;
          $acara->nama_tempat = $request->nama_tempat;
          $acara->kota = $request->kota;
          $acara->alamat = $request->alamat;
          // $acara->kapasitas = $request->kapasitas;
          $acara->deskripsi = $request->deskripsi;
          $acara->tgl_mulai = $request->tgl_mulai;
          $acara->tgl_selesai = $request->tgl_selesai;
          $acara->wkt_mulai = $request->wkt_selesai;
          $acara->wkt_selesai = $request->wkt_selesai;
          if ($request->file('event_img')) {
            $nama_gambar = time() . '.png';
            $request->file('event_img')->storeAs('public/event', $nama_gambar);
            $acara->gambar = $nama_gambar;
          }
          $acara->save();
        $next = Acara::where('user_id', Auth::user()->id)->orderby('id','ASC')->get()->last();
        return redirect()->route('Event.Ticket.Create', ['id'=>$next->id]);
    }

    public function update(Request $request, $id)
    {
        //PROSES PENYIMPANAN Gambar
        $this->validate($request,[
          'event_img' => 'mimes:jpeg,jpg,png|max:10000',
          'nama' => 'required'
        ]);

        $acara = Acara::find($id);
        $acara->nama = $request->nama;
        $acara->nama_tempat = $request->nama_tempat;
        $acara->kota = $request->kota;
        $acara->alamat = $request->alamat;
        // $acara->kapasitas = $request->kapasitas;
        $acara->deskripsi = $request->deskripsi;
        $acara->tgl_mulai = $request->tgl_mulai;
        $acara->tgl_selesai = $request->tgl_selesai;
        $acara->wkt_mulai = $request->wkt_mulai;
        $acara->wkt_selesai = $request->wkt_selesai;
        if ($request->file('event_img')) {
          $nama_gambar = time() . '.png';
          $request->file('event_img')->storeAs('public/event', $nama_gambar);
          $acara->gambar = $nama_gambar;
        }
        $acara->save();
        return redirect()->route('Event.Show',['id'=>$acara->id]);
    }

    public function penjualan($id)
    {
      $acara = Acara::find($id);
      //
      // $produks = Produk::where('acara_id', $id)->get();
      // $transaksis = Transaksi::where('acara_id', $id)
      // ->where('ispaid','y')->get();
      //
      // foreach ($produks as $p) {
      //   array_push($jumlah_penjualan,
      //             $transaksis->TotalTiketLunas($p->id));
      // }

      return view('users.events.penjualan.index',
      compact('acara'));
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

      $acara = Acara::find($transaksi->acara_id);
      $tikets = Tiket::where('transaksi_id', $transaksi_id)->orderBy('produk_id','asc')->get();
      $total =0;
      foreach ($tikets as $t) {
        $total = $total + $t->Produk->harga;
      }
      return view('users.events.pemesan.show', compact('transaksi', 'acara','total', 'tikets'));
    }
// ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
// ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    public function konfirmasi($transaksi_id)
    {
      $transaksi = Transaksi::find($transaksi_id);
      $transaksi->ispaid = 'y';
      $transaksi->save();

      //email pemesan
      Mail::to('ciananda7@gmail.com')->send(new KonfirmasiBukti());
      //email sales
      Mail::to('ciananda7@gmail.com')->send(new KonfirmasiBuktitoSales());
      return redirect()->route('Event.Pemesan.Show',['id'=>$transaksi_id]);
    }
// ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
// ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    public function checkin($id, Request $request)
    {
      $acara = Acara::find($id);
      $stran = $request->input('stran');
      $transaksis = Transaksi::where('acara_id',$id)->where('ispaid','y')
      ->search($stran)
      ->get();

      $stiket = $request->input('stiket');
      if ($stiket) {
        $tikets = Tiket::where('no_tiket',$stiket)->get();
        // dd($tiket);
        // $tikets = Tiket::where('transaksi_id',$tiket->Transaksi->id)->orderBy('produk_id','asc')->get();
        // dd($tikets, $stiket);
        return view('users.events.checkin.index', compact('acara','transaksis','id','tikets'));
      }

      $transaksi_id = $request->transaksi_id;
      if ($transaksi_id) {
        $tikets = Tiket::where('transaksi_id',$transaksi_id)->orderBy('produk_id','asc')->get();
        return view('users.events.checkin.index', compact('acara','transaksis','id','tikets'));
      }



      return view('users.events.checkin.index', compact('acara','transaksis','id'));
    }
// ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
// ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    public function checkin_update(Request $request, $tiket_id)
    {
      $tiket = Tiket::find($tiket_id);
      $tiket->ischeckin = 'y';
      $tiket->save();

      $acara_id = $tiket->Transaksi->acara_id;
      $transaksi_id = $tiket->transaksi_id;
      return redirect()->route('Event.Checkin', ['id' => $acara_id, 'transaksi_id' => $transaksi_id]);
    }
// ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
// ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    public function sales($id)
    {
      $acara = Acara::find($id);
      $saless = Link::where('acara_id',$id)->get();
      return view('users.events.sales.index', compact('acara', 'saless'));
    }


    public function destroy($id)
    {
      //
    }

}
