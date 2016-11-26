<h1>記事一覧</h1>
<ul>
  @foreach ($items as $item)
  <li><a href="">{{ $item->name }}</a></li>
  <li><a href="">{{ $item->price }}</a></li>
  <li><a href="">{{ $item->img }}</a></li>
  <li><a href="">{{ $item->category }}</a></li>
  <li><a href="">{{ $item->stock->stock }}</a></li>
  @endforeach
</ul>
