<!--ここはユーザーが見る商品一覧です-->
<section>
        <h1>商品一覧</h1>
    <table>
      <tr>
        <th>商品名</th>
        <th>価格</th>
        <th>在庫数</th>
        <th>商品画像</th>
        <th>カテゴリー</th>
      </tr>

  <!--この１文はどこのitemをitemsとしforeachしているの？以下はItem::all();のforeach分-->
  @foreach ($items as $item)
      <tr>
        <td>{{ $item->name }}</td>
        <td>{{ $item->price }} 円</td>
        <td>{{ $item->stock->stock }}</td>
        <td>{{ $item->img }}</td>
        <td>{{ $item->category }}</td>
      </tr>
  @endforeach
      
</section>
