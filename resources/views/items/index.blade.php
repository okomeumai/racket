<!--ここはユーザーが見る商品一覧です-->
@extends('layouts.items')

@section('title', '商品一覧')

@section('header')

<section>
  <div class="header_image">
    <img src="/images/logo.png" height="50">
  </div><!--header_image閉じ-->
  </div>
</section>

@endsection

@section('content')

<section>
  <a href="/carts">カートの中身を見る</a>
  <h1>商品一覧</h1>
  <table>
    <tr>
      <th>商品名</th>
      <th>価格</th>
      <th>商品画像</th>
      <th>カテゴリー</th>
    </tr>

  <!--この１文はどこのitemをitemsとしforeachしているの？以下はItem::all();のforeach分-->
    @foreach ($items as $item)
    <tr>
      <td>{{ $item->name }}</td>
      <td>{{ $item->price }} 円</td>
      <td><img src="/itemimages/{{ $item->img }}" height="50"></td>
      <td>{{ $item->category }}</td>

      <!--「カートに入れるボタン」実装-->
      <td><form action="{{ action('CartsController@create', $item->id) }}" id="form_{{ $item->id }}" method="post" style="display:inline">
        {{ csrf_field() }}
        <input type="submit" class="fs12" value="カートに入れる">
      </form></td>
    </tr>
    @endforeach

</section>

@endsection
