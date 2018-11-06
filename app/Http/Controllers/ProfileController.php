<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\User;
use Auth;
class ProfileController extends Controller
{
    public function edit()
    {

      return view('users.profile.edit');
    }

    public function update(Request $request)
    {
      // dd($request->toarray());
      $this->validate($request,[
        'tlp' => 'numeric',
        'no_rekening' => 'numeric',
        'nama_rekening' => 'regex:/^[a-zA-Z\s]+$/'
      ]);

      $user = User::find(Auth::user()->id);
      // dd($user);

      $user->nama_perusahaan = $request->nama_perusahaan;
      $user->alamat = $request->alamat;
      $user->tlp = $request->tlp;
      $user->nama_rekening = $request->nama_rekening;
      $user->no_rekening = $request->no_rekening;
      $user->save();

    return redirect()->route('Profile.Edit');
    }
}
