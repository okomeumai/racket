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

    <!--フラッシュメッセージの表示-->
    @if (session('flash_message') )
      <div class="flash_message">{{session('flash_message')}}</div>
    @endif
    
    <!--左サイドのカテゴリー-->
    <nav>
      <div class="nav">
        <div class="nav_ttl">
          <p>スタイル一覧</p>
        </div> <!--nav_ttl閉じ-->
        <ul>
          <li><a href="/items/オールラウンダー">オールラウンダー</a></li>
          <li><a href="/items/サーブ＆ボレーヤー">サーブ＆ボレーヤー</a></li>
          <li><a href="/items/ベースライナー">ベースライナー</a></li>
        </ul>
      </div><!--nav閉じ-->
    </nav>

    <!--商品列挙-->
    @foreach($items as $item)
      <div class="items_detail">
        <img src="/itemimages/{{ $item->img }}">
        <div class="items_name">
          商品名：</br>{{ $item->name }}
        </div>
        <div class="items_price">
          価格：{{ $item->price }}円
        </div>

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
