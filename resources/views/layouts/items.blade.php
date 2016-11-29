<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <title>@yield('title')</title>
  <link rel="stylesheet" href="/css/items.css">
</head>
<body>
  <div id="container">
    <header>

      @yield('header')

    </header>

  @yield('content')
  </div><!--container閉じ-->
</body>
</html>
