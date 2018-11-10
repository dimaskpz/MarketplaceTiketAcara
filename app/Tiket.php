<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tiket extends Model
{
  public function Produk()
  {
    return $this->belongsTo('App\Produk');
  }

  public function Transaksi()
  {
    return $this->belongsTo('App\Transaksi');
  }

  public function getTotalHargaAttribute(){
    return $this->produk->totalHarga;
  }

  public function getTotalBersihAttribute(){
    return $this->produk->totalBersih;
  }

}
