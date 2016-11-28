<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model {
  public function item() {
    return $this->belongTo('App\Item');
  } // public function item閉じ
} // Stock閉じ
