<?php
//このファイルは消費者が見るitem一覧
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use App\Stock;

class ItemsController extends Controller {
  // topページの表示
  public function top() {
    return view('top');
  } // public function top閉じ

  // カテゴリー別の商品の表示
  public function index($category = null) {
    if (is_null($category)) {
      $items = Item::all();
    } else {
      $items = Item::where('category', $category)->get();
    }
    //dd($category);
    return view('items.index')->with('items', $items);
  } // public function index閉じ
} // ItemsController閉じ
