<?php
//このファイルは管理者が見るitem一覧

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;


class AdminsController extends Controller
{
  //関数index
  public function index() {

    //Itemモデルを全て変数$itemsへ代入
    $items = Item::all();

    //変数itemsに渡ってきているかddを使ってチェック
    //dd($items);

    //$itemsを'items'に入れるイメージ。そのitemsをadmins/index内で変数$itemsとして使える。
    return view('admins.index')->with('items', $items);
  }


}
