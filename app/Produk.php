<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
  protected $appends = [
    'totalTiketLunas'
  ];

  public function Acara()
  {
    return $this->belongsTo('App\Acara');
  }

  public function Tiket()
  {
    return $this->hasMany('App\Tiket');
  }

  public function getTotalHargaAttribute()
  {
    return $this->harga ;
  }

  public function getTotalTiketLunasAttribute(){
    $tikets = $this->tiket;
    $count = 0;
    foreach($tikets as $tiket){
      if($tiket->isPaid) $count = $count+1;
    }
    return $count;
  }

  public function getTotalBersihAttribute()
  {
    if ($this->komisi_jenis == 'tetap') {
      return $this->komisi_tetap;
    }else {
      $a=0;
      $a = ($this->komisi_persen / 100 ) * $this->harga;
      // dd($a, 'Model Produk');
      return $a;
    }
  }

  // public function getTotalTiketLunasAttribute()
  // {
  //   return $this->
  // }

























}
