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
          <button>購入する</button>
        </form>
        @endif
      </div> <!--buy閉じ-->
    </header>
    
    <div class="text_shopping_cart">
      <h1>ショッピングカート</h1>
    </div>

    <!--フラッシュメッセージの表示-->
    @if (session('flash_message') )
      <div class="flash_message">{{session('flash_message')}}</div>
    @endif

    <div class="buy_sum_box">
      <span class="buy_sum_title">合計</span>
      <span class="buy_sum_price">{{ $priceSum }}円</span>
    </div> <!--buy-sum-box閉じ-->

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

    @foreach($carts as $cart)
      <div class="item_of_cart">
        <img src="/{{ \Config::get('const.ITEM_IMG_PATH') }}/{{ $cart->item->img }}">
        <p>商品名：{{ $cart->item->name }} </p>
        <p>価格：{{ $cart->item->price }}円 </p>

        <!--カートの商品数量変更-->
        <form class="amount_change" method="post" action="{{ url('/carts', $cart->id) }}">
          {{ csrf_field() }}
          {{ method_field('patch') }}
          <input class="amount_change_text" type="text" name="amount" value={{ $cart->amount }}>個&nbsp;&nbsp;<input class="amount_change_button" type="submit" value="変更する">
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
