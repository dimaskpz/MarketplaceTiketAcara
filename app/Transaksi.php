<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
  // public function Link()
  // {
  //   return $this->belongsTo('App\Link');
  // }
  public function dtransaksi()
  {
    return $this->HasMany('App\Dtransaksi');
  }

  public function User()
  {
    return $this->belongsTo('App\User');
  }
}
