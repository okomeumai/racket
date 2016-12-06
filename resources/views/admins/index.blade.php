<!--ここは管理者が見る商品一覧です-->
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <title>管理者画面</title>
  <link rel="stylesheet" href="/css/admin.css">
</head>
<body>
  <div class="text_admin">
    <h1>管理ページ</h1>
  </div>
  <!--商品の登録-->
  <div class="registration">
    <h1>商品の登録</h1>
    <!--フラッシュメッセージの表示-->
    @if (session('flash_message') )
      <div class="flash_message">{{session('flash_message')}}</div>
    @endif

    <div class="input_list">
      <form method="post" action="{{ url('/admins') }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <p>商品名：<input class="item_name" type="text" name="name" placeholder="商品名"  size="50" maxlength="50"></p>
        <p>価格：<input class="item_price" type="text" name="price" placeholder="価格" size="6" maxlength="6"></p>
        <p>個数：<input class="item_amount" type="text" name="stock" placeholder="個数" size="3" maxlength="3"></p>
        <p>商品画像：<input class="item_image" type="file" name="img"></p>
        <p class="category">カテゴリー:
          <select name="category">
            <option value="オールラウンダー">オールラウンダー</option>
            <option value="サーブ＆ボレーヤー">サーブ＆ボレーヤー</option>
            <option value="ベースライナー">ベースライナー</option>
          </select>
        </p>
        <p class="item_registration"><input type="submit" value="商品を登録する"></p>
      </form>
    </div> <!--input_list閉じ-->
  </div> <!--registration閉じ-->

  <!--商品の一覧-->
  <div class="all_list">
    <h1>商品一覧</h1>
    <table class="list">
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
        <td>
          <form method="post" action="{{ url('/admins', $item->id) }}">
              {{ csrf_field() }}
              {{ method_field('patch') }} <!--post以外は書く必要がある。-->
              <input class="stock_amount" type="text" name="stock" size="3" maxlength="3" value={{ $item->stock ? $item->stock->stock: 0 }} >個&nbsp;&nbsp;<input type="submit" value="変更する">
          </form>
        </td>

        <!--画像の大きさ指定。heightだけでwidthは合わしてくれる。-->
        <td><img src="/itemimages/{{ $item->img }}"></td>
        <td>{{ $item->category }}</td>

        <!--削除ボタン実装-->
        <td>
          <form action="{{ action('AdminsController@destroy', $item->id) }}" id="form_{{ $item->id }}" method="post" style="display:inline">
            {{ csrf_field() }}
            {{ method_field('delete') }}
            <input type="submit" class="fs12" value="削除">
          </form>
        </td>　<!--削除ボタン終了-->
      </tr>
    @endforeach
    </table>
  </div> <!--list閉じ-->
</div> <!--container閉じ-->
</body>
</html>
