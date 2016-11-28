<?php
//このファイルは管理者が見る全商品一覧
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Item;
use App\Stock;
use DB;

class AdminsController extends Controller {
  //一覧情報の表示
  public function index() {
    //Itemモデルを全て変数$itemsへ代入
    $items = Item::all();

    //変数itemsに渡ってきているかddを使ってチェック
    //dd($items);

    //$itemsを'items'に入れるイメージ。そのitemsをadmins/index内で変数$itemsとして使える。
    return view('admins.index')->with('items', $items);
  } //public function index閉じ

  // 商品の追加
  public function create(Request $request) {
    // アップロードファイルの取得
    $img = $request->file('img');
    $filename = $img->getClientOriginalName();

    // 拡張子の取得
    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    // 保存するファイル名(ランダムな)の生成
    $new_filename = sha1(uniqid(mt_rand(), true)). '.' . $extension;

    // アップロードファイルをサーバ(MAMP)に保存
    $item_img_path = \Config::get('const.ITEM_IMG_PATH'); // アップロード先のファイルパス
    $img->move(public_path($item_img_path), $new_filename);

    try {
      // トランザクション開始
      DB::beginTransaction();

      // 商品情報
      $item = new Item();
      $item->name   = $request->name;
      $item->price  = (int)$request->price;
      $item->img    = $new_filename;
      $item->category = $request->category;
      $item->save();

      // 在庫
      $stock = new Stock();
      $stock->stock = (int)$request->stock;
      $item->stock()->save($stock);

      //上記２つのテーブルを合体
      DB::commit();

    } catch( \Exception $e ) {
      //dd($e);
      DB::rollBack();
      return redirect('/admins')->with('flash_message', 'データ追加に失敗しました。');
    }

      return redirect('/admins')->with('flash_message', '商品を追加しました。');
  } //public function create閉じ

  // 商品の更新
  public function update(Request $request, $id) {
    $this->validate($request, [
      'stock'  => 'required|integer',
    ]);

    try {
      Stock::where('item_id', $id)->update(['stock' => (int)$request->stock]);
    } catch( \Exception $e ) {
      return redirect('/admins')->with('flash_message', 'データ更新に失敗しました。');
    }
      return redirect('/admins')->with('flash_message', '在庫数を更新しました。');
  } //public function update閉じ

  // 商品の削除
  public function destroy($id) {
    $item = Item::findOrFail($id);
    $item->delete();
    return redirect('/admins')->with('flash_message', 'Item Deleted!');
  } //public function destroy閉じ

} //AdminsController閉じ
