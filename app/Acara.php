<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Acara extends Model
{
  public function User()
  {
    return $this->belongsTo('App\User');
  }

  public function Produk()
  {
    return $this->hasMany('App\Produk');
  }

  public function Link()
  {
    return $this->hasMany('App\Link');
  }

  public function Transaksi()
  {
    return $this->hasMany('App\Transaksi');
  }

  public function getTotalTiketAcaraAttribute()
  {
    $jumlah =0;
    foreach ($this->Transaksi as $transaksi) {
      $jumlah = $jumlah + $transaksi->totalTiketAcara;
    }
    return $jumlah;
  }


























  // public function Tiket()
  // {
  //   return $this->hasMany('App\Tiket');
  // }
}
