<!--ここは管理者が見る商品一覧です-->
<section>
        <h1>商品一覧</h1>
    <table>
      <tr>
        <th>商品名</th>
        <th>価格</th>
        <th>在庫数</th>
        <th>商品画像</th>
        <th>カテゴリー</th>
        <th>操作</th>
      </tr>

  <!--この１文はどこのitemをitemsとしforeachしているの？-->
  @foreach ($items as $item)
      <tr>
        <td>{{ $item->name }}</td>
        <td>{{ $item->price }} 円</td>
        <td>{{ $item->stock->stock }}</td>
        <td>{{ $item->img }}</td>
        <td>{{ $item->category }}</td>

        <!--「削除ボタン」実装-->
        <form method="post">
          {{ csrf_field() }}
          {{ method_field('delete') }}
          <td><input type="submit" value="削除する"></td>
        </form>
      </tr>
  @endforeach
    </table>
</ul>
</section>
