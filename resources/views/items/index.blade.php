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
      <a href="/"><img src="/images/title.png"></a>
      <p>〜プレイスタイル別テニスラケットSHOP〜</p>
    </header>

  <a href="/carts">カートの中身を見る</a>

    <!--各カテゴリー向け一覧-->
    <div>
      <h1>{{ $item->category }}向け商品一覧</h1>
    </div>

    <!--各カテゴリー別説明文掲載-->
    <div class="text_category">
      
    </div>

    <!--商品列挙-->
    @foreach($items as $item)
      <div class="items_detail">
        <img src="/itemimages/{{ $item->img }}" height="130">
        <p class="items_name">商品名：{{ $item->name }}</p>
        <p class="items_price">価格：{{ $item->price }}円</p>
        <p class="items_amount">数量：{{ $item->amount }}</p>
      </div> <!--items_detail閉じ-->

      <!--「カートに入れるボタン」実装-->
      <form action="{{ action('CartsController@create', $item->id) }}" id="form_{{ $item->id }}" method="post" style="display:inline">
        {{ csrf_field() }}
        <input type="submit" class="fs12" value="カートに入れる">
      </form>
    @endforeach
  </div> <!--container閉じ-->
</body>
</html>
