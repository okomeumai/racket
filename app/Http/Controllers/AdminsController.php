<?php
//このファイルは管理者が見るitem一覧

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;


class AdminsController extends Controller
{
  public function index() {
    $items = Item::all();
    //dd($items);
    return view('admins.index')->with('items', $items);
  }
}
