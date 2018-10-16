<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
  public function Link()
  {
    return $this->belongsTo('App\Link');
  }
}
