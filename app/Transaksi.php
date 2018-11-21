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

  public function getTotalTiketAcaraAttribute()
  {
    return $this->tiket->count();
  }


  public function scopeSearch($query, $s)
  {
    return $query->where('no_nota', 'like', '%' .$s.'%')
    ->orWhere('nama', 'like', '%' . $s . '%')
    ->orWhere('email', 'like', '%' . $s . '%')
    ->orWhere('tlp', 'like', '%' . $s . '%');
  }

//BARU LAPORAN PENJUALAN




//
  //
  // public function getTotalAttribute($produk_id)
  // {
  //   $jumlah_tiket = 0;
  //   foreach ($this as $transaksi) {
  //     $jumlah_tiket = $jumlah_tiket + $transaksi->Tiket->totalTiketLunas($produk_id);
  //   }
  //   return $jumlah_tiket;
  // }











// LANJUT KE MODEL TIKET FUNCTION getTotalTiketLunasAttribute($produk_id)













}
