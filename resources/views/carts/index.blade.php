<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
    <title>カート</title>
  <link rel="stylesheet" href="/css/cart.css">
</head>
<body>
  <div id="container">
    <header>
      <div class="img_title">
        <a href="/"><img src="/images/title.png"></a>
        <p>〜プレイスタイル別テニスラケットSHOP〜</p>
      </div>
      <div class="buy">
        @if ( $priceSum )
        <form action="{{ url('/carts/buy') }}" method="post">
          {{ csrf_field() }}
        <a href="/carts/buy"><p>購入する</p></a>
        </form>
        @endif
      </div> <!--buy閉じ-->
    </header>

    <div class="text_cart">
      <h1>ショッピングカート</h1>
    </div>

    <div class="buy-sum-box">
      <span class="buy-sum-title">合計</span>
      <span class="buy-sum-price">{{ $priceSum }}円</span>
      @if ( $priceSum )
      <form action="{{ url('/carts/buy') }}" method="post">
        {{ csrf_field() }}
        <input class="buy-btn" type="submit" value="購入する">
      </form>
      @endif
    </div> <!--buy-sum-box閉じ-->

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

    @foreach($carts as $cart)
      <div class="item_of_cart">
        <img src="/{{ \Config::get('const.ITEM_IMG_PATH') }}/{{ $cart->item->img }}">
        <p>商品名：{{ $cart->item->name }} </p>
        <p>価格：{{ $cart->item->price }}円 </p>

        <!--カートの商品数量変更-->
        <form  method="post" action="{{ url('/carts', $cart->id) }}">
          {{ csrf_field() }}
          {{ method_field('patch') }}
          <input type="text" name="amount" value={{ $cart->amount }}>個&nbsp;&nbsp;<input type="submit" value="変更する">
        </form>

        <!--カートの商品削除-->
        <form method="post" action="{{ url('/carts', $cart->id) }}">
          {{ csrf_field() }}
          {{ method_field('delete') }}
          <input type="submit" value="取り消し">
        </form>
      </div> <!--item_of_cart閉じ-->
    @endforeach
  </div> <!--container閉じ-->
</body>
</html>
