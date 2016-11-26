<?php
//このファイルは消費者が見るitem一覧

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;


class ItemsController extends Controller
{
  //一旦全てを表示
  public function index() {
    $items = Item::all();
    //dd($items);
    return view('items.index')->with('items', $items);
  }
  //一覧情報の表示


  //商品をカートに入れる











}
