<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
  //SALES
  public function User()
  {
    return $this->belongsTo('App\User');
  }

  public function Tiket()
  {
    return $this->HasMany('App\Tiket');
  }
  public function Acara()
  {
    return $this->belongsTo('App\Acara');
  }

  public function getTotalOmsetAttribute()
  {
    $jumlah = 0;
    foreach($this->tiket as $tiket){
      $jumlah = $jumlah + $tiket->totalHarga;
    }
    return $jumlah;
  }


public function getTotalBersihAttribute()
{
  $jumlah = 0;
  foreach ($this->tiket as $tiket) {
    $jumlah = $jumlah + $tiket->totalBersih;
  }
  return $jumlah;
}
















  // public function totalHarga($tikets)
  // {
  //   $jumlah = 0;
  //   foreach ($tikets as $tiket) {
  //     $jumlah = $jumlah + $tiket->produk->harga;
  //   }
  //   return $jumlah;
  // }
}
