<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;
use App\Stock;
use DB;

class CartsController extends Controller {
  // 一覧情報の表示
  public function index() {
    // Cartモデルを全て変数$cartsへ代入
    $carts = Cart::all();

    // 変数itemsに渡ってきているかddを使ってチェック
    //dd($cart);

    // 合計金額の設定
    $priceSum = $this->getPriceSum($carts);
    // $cartsをcartsに代入して、viewのcartsのindex.blade.php内にて$cartsとして用いることができる。
    return view('carts.index', ['carts' => $carts, 'priceSum' => $priceSum]);
  } // public function index閉じ

  // 商品をカートに入れる
  public function create(Request $request, $category, $id) {
    $records = Cart::where('item_id', $id)->get();

    // 対象商品が存在しない場合はレコードを新規追加、存在している場合は数量を+1に更新する。
    if(count($records) == 0) {

      // レコード新規追加
      $cart = new Cart();
      $cart->item_id = (int)$id;
      $cart->amount = 1;
      $cart->save();

    } else {
      // 数量を+1に更新する
      Cart::where('item_id', $id)->update(['amount' => ($records[0]->amount + 1)]);
    } // if終了
    return redirect('/items/'.$category)->with('flash_message', '商品をカートに入れました。');
  } // public function create閉じ

  // 合計金額の取得
  private function getPriceSum($carts) {
    $priceSum = 0;
    foreach($carts as $cart) {
      $priceSum += $cart->item->price * $cart->amount;
    } // foreach終了
    return $priceSum;
  } // private function getPriceSum閉じ

  // 商品数量の変更
  public function update(Request $request, $id) {
    try {
      Cart::where('id', $id)->update(['amount' => (int)$request->amount]);
    } catch( \Exception $e ) {
      return redirect('/carts')->with('flash_message', 'データ更新に失敗しました。');
    } // trycatch終了
    return redirect('/carts')->with('flash_message', '商品数量を変更しました。');
  } // public function update閉じ

  // 購入完了の表示
  public function buy() {
    // 購入完了に表示するデータの取得
    $carts = Cart::all();
    // 購入商品の在庫の変更、カート情報の削除
    try{
      // トランザクション開始
      DB::beginTransaction();
      foreach ($carts as $cart) {
        // 購入商品の在庫の変更
        $stock = Stock::where('item_id', $cart->item_id)->get();
        Stock::where('item_id', $cart->item_id)->update(['stock' => ($stock[0]->stock - $cart->amount)]);
        // カート情報の削除
        Cart::where('item_id', $cart->item_id)->delete();
      } // foreach終了
      // コミット
      DB::commit();

    } catch( \Exception $e ) {
      DB::rollBack();
      return redirect('/cart')->with('flash_message', 'データ削除に失敗しました。');
    } // trycatch終了

    // 合計金額の設定
    $priceSum = $this->getPriceSum($carts);
    return view('finish', ['carts' => $carts, 'priceSum' => $priceSum]);
  } // public function buy閉じ
} // CartsController閉じ
