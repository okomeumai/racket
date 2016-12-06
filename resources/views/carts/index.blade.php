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
    </header>

    <div class="text_shopping_cart">
      <h1>ショッピングカート</h1>
      <!--フラッシュメッセージの表示-->
      @if (session('flash_message') )
        <div class="flash_message">{{session('flash_message')}}</div>
      @endif
    </div>

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

    <div class="list_title">
      <span class="list_name">商品名</span>
      <span class="list_price">価格</span>
      <span class="list_amount">数量</span>
    </div>

    @foreach($carts as $cart)
      <div class="item_of_cart">
        <!--カートの商品image-->
        <img src="/{{ \Config::get('const.ITEM_IMG_PATH') }}/{{ $cart->item->img }}">

        <!--カートの商品名-->
        <p class="item_name">{{ $cart->item->name }} </p>

        <!--カートの商品削除-->
        <form class="cancel" method="post" action="{{ url('/carts', $cart->id) }}">
          {{ csrf_field() }}
          {{ method_field('delete') }}
          <input type="submit" value="取り消し">
        </form>

        <p class="item_price">{{ $cart->item->price }}円 </p>

        <!--カートの商品数量変更-->
        <form class="amount_change" method="post" action="{{ url('/carts', $cart->id) }}">
          {{ csrf_field() }}
          {{ method_field('patch') }}
          <input class="amount_change_text" type="text" name="amount" value={{ $cart->amount }}>個&nbsp;&nbsp;<input class="amount_change_button" type="submit" value="変更する">
        </form>
      </div> <!--item_of_cart閉じ-->
    @endforeach

    <div class="buy_sum_box">
      <span class="buy_sum_title">合計</span>
      <span class="buy_sum_price">{{ $priceSum }}円</span>
    </div> <!--buy-sum-box閉じ-->

    <div class="buy">
      @if ( $priceSum )
      <form action="{{ url('/carts/buy') }}" method="post">
        {{ csrf_field() }}
        <button>購入する</button>
      </form>
      @endif
    </div>
  </div> <!--container閉じ-->
</body>
</html>
