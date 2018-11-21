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

  public function getIsPaidAttribute(){
    return $this->transaksi->ispaid == 'y';
  }







//BARU LAPORAN PENJUALAN



  public function getTotalTiketLunasAttribute($produk_id)
  {
    return $this->where('produk_id', $produk_id)->count();
  }






























}
