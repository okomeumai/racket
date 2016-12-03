<!--ここはユーザーが見る商品一覧です-->
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  @foreach ($items as $item)
    <title>{{ $item->category }}向け商品一覧</title>
  @endforeach
  <link rel="stylesheet" href="/css/items.css">
</head>
<body>
  <div id="container">
    <header>
      <div class="img_title">
        <a href="/"><img src="/images/title.png"></a>
        <p>〜プレイスタイル別テニスラケットSHOP〜</p>
      </div> <!--img_title閉じ-->
      <div class="watchCart">
        <a href="/carts"><p>カートの中身を見る</p></a>
      </div> <!--watchCart閉じ-->
    </header>

    <!--各カテゴリー向け一覧-->
    <div class="text_category">
      <h1>{{ $item->category }}向け商品一覧</h1>
    </div>

    <!--各カテゴリー別説明文掲載-->
    <div>
    </div>

    <!--左サイドのカテゴリー-->
    <nav>
      <div class="nav">
        <div class="nav_ttl">
          <p>スタイル一覧</p>
        </div> <!--nav_ttl閉じ-->
        <ul>
          <li><a href="/items/オールラウンダー" target="_blank">オールラウンダー</a></li>
          <li><a href="/items/サーブ＆ボレーヤー" target="_blank">サーブ＆ボレーヤー</a></li>
          <li><a href="/items/ベースライナー" target="_blank">ベースライナー</a></li>
        </ul>
      </div><!--nav閉じ-->
    </nav>

    <!--商品列挙-->
    @foreach($items as $item)
      <div class="items_detail">
        <img src="/itemimages/{{ $item->img }}" height="130">
        <p class="items_name">商品名：{{ $item->name }}</p>
        <p class="items_price">価格：{{ $item->price }}円</p>
        <p class="items_amount">数量：
          <select name="items_amount">
            <option value="">１</option><option value="2">２</option><option value="3">３</option><option value="4">４</option><option value="5">５</option>
            <option value="6">６</option><option value="7">７</option><option value="8">８</option><option value="9">９</option><option value="10">１０</option>
          </select>
        </p>
      <!--「カートに入れるボタン」実装-->
      <form action="{{ action('CartsController@create',[$category, $item->id]) }}" id="form_{{ $item->id }}" method="post" style="display:inline">
        {{ csrf_field() }}
        <button>カートに入れる</button>
      </form>
      </div> <!--items_detail閉じ-->
    @endforeach
  </div> <!--container閉じ-->
</body>
</html>
