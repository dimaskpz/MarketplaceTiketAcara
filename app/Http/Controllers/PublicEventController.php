<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Link;
use App\Acara;
class PublicEventController extends Controller
{
    public function show($link)
    {
      $acara_id = Link::where('link',$link)->get();

      if ($acara_id) {
          $acara = Acara::find($acara_id)->first();
      } else {
          // TAMPILKAN ERROR
          // abort ('304');
      }      
      return view('users.publics.show', compact('acara'));
    }
}
