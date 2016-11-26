<?php
//このファイルは消費者が見るitem一覧

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use App\Stock;


class ItemsController extends Controller
{

  //全データの表示(消費者が見るページなので最終的にはここは消す?)
  public function index() {
    $items = Item::all();
    //dd($items);
    return view('items.index')->with('items', $items);
  }



/*
  //all_rounderの情報表示
  public function all_rounder() {
    //itemsテーブルのid1番を見にいき、stocksのitem_idを見に行く。itemsとstocksはモデルのItemとモデルのStockで繋がっている。
    $all_rounder = Stock::where('item_id', 1)->get();
    //dd($all_rounder);
    //$all_rounder = $item->stock;
    //dd($all_rounder);
    return view('items.index', ['all_rounder' => $all_rounder]);
  }

  public function serve_and_volley() {
    //モデルItemからitem_id2番だけ表示させたい
    $serve_and_volley = Stock::where('item_id', 2)->get();
    return view('items.index', ['serve_and_volley' => $serve_and_volley]);
  }

  public function baseliner() {
    //モデルItemからitem_id3番だけ表示させたい
    $baseliner = Stock::where('item_id', 3)->get();
    return view('items.index', ['baseliner' => $baseliner]);
  }

  //商品をカートに入れる
*/










}
