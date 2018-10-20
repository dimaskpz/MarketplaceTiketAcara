<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dtransaksi extends Model
{
    public function produk()
    {
      return $this->belongsTo('App\Produk');
    }

    public function transaksi()
    {
      return $this->belongsTo('App\Transaksi');
    }

    public function tiket()
    {
      return $this->HasMany('App\Tiket');
    }
}
