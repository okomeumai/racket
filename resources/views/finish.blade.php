<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <title>FitTennis</title>
  <link rel="stylesheet" href="/css/top.css">
</head>
<body>
  <div id="container">
  <header>
    <a href="/"><img src="/images/title.png"></a>
  </header>
        <div>ご購入完了致しました。</div>
        <div>
            <span>価格</span>
            <span>数量</span>
        </div>
            <ul>
              @foreach($carts as $cart)
                <li>
                    <div>
                        <img src="/{{ \Config::get('const.ITEM_IMG_PATH') }}/{{ $cart->item->img }}">
                        <span>商品名：{{ $cart->item->name }}</span>
                        <span>価格：{{ $cart->item->price }}円</span>
                        <span>数量：{{ $cart->amount }}</span>
                    </div>
                </li>
                @endforeach
            </ul>
        <div>
            <span>合計</span>
            <span>¥{{ $priceSum }} </span>
            <span>お買い上げありがとうございました。</span>
            <a href="/"><img src="/images/go_to_top.png"></a>
        </div>
  </div><!--container閉じ-->
</body>
</html>
