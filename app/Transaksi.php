<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
  public function User()
  {
    return $this->belongsTo('App\User');
  }

  public function Tiket()
  {
    return $this->HasMany('App\Tiket');
  }
}
