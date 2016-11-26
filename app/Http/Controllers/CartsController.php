<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;


class CartsController extends Controller
{
  public function index() {
    $cart = Cart::all();
    //dd($cart);
  }
}
