<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <title>@yield('title')</title>
  <link rel="stylesheet" href="/css/user.css">
  @yield('css')
</head>
<body>
  <header>
    <div class="header-box">
      <a href="{{ url('/') }}">
      </a>
      <a href="{{ url('/cart') }}" class="cart"></a>
    </div>
  </header>

  @if (session('flash_message') )
    <div class="flash_message">{{session('flash_message')}}</div>
  @endif

  @yield('content')

</body>
</html>
