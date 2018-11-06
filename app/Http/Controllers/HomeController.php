<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Acara;
use App\Link;
use Carbon\Carbon;
use Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $now = Carbon::now();
// dd($now);
        $acaras = Acara::all();
// dd($acaras);
        return view('users.home.index', compact('acaras'));
    }

    public function show($acara_id)
    {
      $acara = Acara::find($acara_id);
      $link = Link::where('acara_id',$acara_id)->where('user_id', Auth::user()->id)->get()->first();
      if ($link) {
      return view('users.home.show', compact('acara','link'));
      }

      return view('users.home.show', compact('acara'));
    }

    public function sales_regis($acara_id)
    {
      do {
        $rand = substr(md5(microtime()),rand(0,26),7);
        $cek_link = Link::where('link',$rand)->exists();
      } while ( ! $rand);

      $link = new Link;
      $link->user_id = Auth::user()->id;
      $link->acara_id = $acara_id;
      $link->link = $rand;
      $link->save();

      return redirect()->route('Home.Event.Show', ['acara_id'=> $acara_id]);
    }
}
