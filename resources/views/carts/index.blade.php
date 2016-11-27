@extends('layouts.default')
@section('title', 'カート')
@section('content')

<div class="container">
  <h1>ショッピングカート</h1>

@if(!empty($carts))
  <div class="cart-list-title">
    <span class="cart-list-price">価格</span>
    <span class="cart-list-num">数量</span>
  </div>
@endif

  <ul class="cart-list">
  @foreach($carts as $cart)
    <li>
      <div class="cart-item">
        <img class="cart-item-img" src="/{{ \Config::get('const.ITEM_IMG_PATH') }}/{{ $cart->item->img }}">
        <span class="cart-item-name">{{ $cart->item->name }} </span>
        <form class="cart-item-del" action="{{ url('/cart', $cart->id) }}"  method="post">
          {{ csrf_field() }}
          {{ method_field('delete') }}
          <input type="submit" value="削除">
        </form>
        <span class="cart-item-price">¥ {{ $cart->item->price }}</span>
        <form class="form_select_amount" id="form_select_amount1" action="{{ url('/cart', $cart->id) }}" method="post">
          {{ csrf_field() }}
          {{ method_field('patch') }}
          <input type="number" type="text" class="input_text_width text_align_right" name="amount" value={{ $cart->amount }}>個&nbsp;&nbsp;<input type="submit" value="変更する">
        </form>
      </div> <!--cart-item閉じ-->
    </li>
  @endforeach
  </ul>

  <div class="buy-sum-box">
    <span class="buy-sum-title">合計</span>
    <span class="buy-sum-price">¥{{ $priceSum }} </span>
  </div> <!--buy-sum-box閉じ-->

      <div>
        @if ( $priceSum )
        <form action="{{ url('/carts/buy') }}" method="post">
          {{ csrf_field() }}
          <input class="buy-btn" type="submit" value="購入する">
        </form>
        @endif
      </div>
</div> <!--container閉じ-->
@endsection
