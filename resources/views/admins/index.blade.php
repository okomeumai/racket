<!--ここは管理者が見る商品一覧です-->
@extends('layouts.admin')
@section('title', '管理者画面')
@section('content')

<h2>商品の登録</h2>

<form method="post" action="{{ url('/admins') }}" enctype="multipart/form-data">
  {{ csrf_field() }}
  <p>商品名：<input type="text" name="name" placeholder="商品名"></p>
  <p>価格：<input type="text" name="price" placeholder="価格"></p>
  <p>個数：<input type="text" name="stock" placeholder="個数"></p>
  <p>商品画像：<input type="file" name="img"></p>
  <p>カテゴリー：
    <select name="category">
      <option value="オールラウンダー">オールラウンダー</option>
      <option value="サーブ＆ボレーヤー">サーブ＆ボレーヤー</option>
      <option value="ベースライナー">ベースライナー</option>
    </select>
  </p>
  <p><input type="submit" value="商品を登録する"></p>
</form>

<div class="container">
  <section>
    <h1>商品一覧</h1>
    <table>
      <tr>
        <th>商品名</th>
        <th>価格</th>
        <th>在庫数</th>
        <th>商品画像</th>
        <th>カテゴリー</th>
        <th>操作</th>
      </tr>
    @foreach ($items as $item)
      <tr>
        <td>{{ $item->name }}</td>
        <td>{{ $item->price }} 円</td>
        <td><form method="post" action="{{ url('/admins', $item->id) }}">
              {{ csrf_field() }}
              {{ method_field('patch') }} <!--post以外は書く必要がある。-->
              <input type="text" name="stock" value={{ $item->stock ? $item->stock->stock: 0 }} >個&nbsp;&nbsp;<input type="submit" value="変更する">
            </form></td>
        <!--画像の大きさ指定。heightだけでwidthは合わしてくれる。-->
        <td><img src="/itemimages/{{ $item->img }}" height="50"></td>
        <td>{{ $item->category }}</td>
        <!--削除ボタン実装-->
        <td><form action="{{ action('AdminsController@destroy', $item->id) }}" id="form_{{ $item->id }}" method="post" style="display:inline">
              {{ csrf_field() }}
              {{ method_field('delete') }}
              <input type="submit" class="fs12" value="削除">
            </form></td>　<!--削除ボタン終了-->
      </tr>
    @endforeach
    </table>
  </section>
</div> <!--container閉じ-->
@endsection
