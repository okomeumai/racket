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
      <p>〜プレイスタイル別テニスラケットSHOP〜</p>
    </header>
      <div class="text_finished">
        <p>ご購入完了致しました。</p>
      </div> <!--text_finished閉じ-->

        @foreach($carts as $cart)
          <div class="items_finished">
            <img src="/{{ \Config::get('const.ITEM_IMG_PATH') }}/{{ $cart->item->img }}">
            <p class="items_name">商品名：{{ $cart->item->name }}</p>
            <p class="items_price">価格：{{ $cart->item->price }}円</p>
            <p class="items_amount">数量：{{ $cart->amount }}</p>
          </div> <!--items_finished閉じ-->
        @endforeach

      <div class="sum">
        <span>合計</span>
        <p class="priceSum">¥{{ $priceSum }} </p>
        <p class="text_thanks">お買い上げありがとうございました。</p>
        <a href="/"><img src="/images/go_to_top.png"></a>
      </div><!--sum閉じ-->
  </div><!--container閉じ-->
</body>
</html>
