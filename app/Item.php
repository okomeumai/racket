<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model {
  public function stock() {
    return $this->hasOne('App\Stock');
  } // public function stock閉じ
  public function cart() {
    return $this->hasOne('App\Cart');
  } // public function cart閉じ
} // Item閉じ
