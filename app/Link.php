<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
  // public function mkaryawan(){
  //   return $this->belongsTo('App\Models\GM\mkaryawan');
  // }
  public function User()
  {
    return $this->belongsTo('App\User');
  }

  public function Transaksi()
  {
    return $this->HasMany('App\Transaksi');
  }
}
