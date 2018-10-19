<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
  public function Acara()
  {
    return $this->belongsTo('App\Acara');
  }
}
