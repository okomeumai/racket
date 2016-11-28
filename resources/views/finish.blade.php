@extends('layouts.default')

@section('title', '購入完了画面')

@section('content')

<div class="content">
        <div class="finish-msg">ご購入完了致しました。</div>
        <div class="cart-list-title">
            <span class="cart-list-price">価格</span>
            <span class="cart-list-num">数量</span>
        </div>
            <ul class="cart-list">
              @foreach($carts as $cart)
                <li>
                    <div class="cart-item">
                        <img class="cart-item-img" src="/{{ \Config::get('const.ITEM_IMG_PATH') }}/{{ $cart->item->img }}">
                        <span class="cart-item-name">商品名：{{ $cart->item->name }}</span>
                        <span class="cart-item-price">価格：{{ $cart->item->price }}円</span>
                        <span class="finish-item-price">数量：{{ $cart->amount }}</span>
                    </div>
                </li>
                @endforeach
            </ul>
        <div class="buy-sum-box">
            <span class="buy-sum-title">合計</span>
            <span class="buy-sum-price">¥{{ $priceSum }} </span>
            <span class="finish-msg">お買い上げありがとうございました。</span>
            <a href="/">トップページに戻る</a>
        </div>
    </div>

@endsection
