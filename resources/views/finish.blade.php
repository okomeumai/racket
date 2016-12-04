<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <title>購入完了</title>
  <link rel="stylesheet" href="/css/finish.css">
</head>
<body>
  <div id="container">
    <header>
      <a href="/"><img src="/images/title.png"></a>
      <p class="subtitle">〜プレイスタイル別テニスラケットSHOP〜</p>
      <div class="go_to_top">
        <a href="/"><p class="text_go_to_top">トップページへ戻る</p></a>
      </div>
    </header>
      <div class="text_finished">
        <p>お買い上げありがとうございました。ご購入完了致しました。</p>
        <span>合計</span>
        <span class="priceSum">¥{{ $priceSum }} </span>
      </div> <!--text_finished閉じ-->

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
          <div class="items_finished">
            <img src="/{{ \Config::get('const.ITEM_IMG_PATH') }}/{{ $cart->item->img }}">
            <p class="items_name">商品名：{{ $cart->item->name }}</p>
            <p class="items_price">価格：{{ $cart->item->price }}円</p>
            <p class="items_amount">数量：{{ $cart->amount }}</p>
          </div> <!--items_finished閉じ-->
        @endforeach

  </div><!--container閉じ-->
</body>
</html>
