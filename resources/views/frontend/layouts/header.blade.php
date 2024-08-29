<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Header</title>
</head>

<body>
  <header>
    @if (strpos(Route::current()->uri, 'cart') === 0)
    @else
      <div class="header-1">
        <a href="{{ route('home') }}" class="logo"></i>Nông trại organic</a>
        <form action="{{ route('search-product') }}" method="get" class="search-box-container">
          {{-- @csrf --}}
          <input type="search" name="name" id="search-box" placeholder="search here...">
          <button type="text" class="fas fa-search"></button>
        </form>
      </div>
    @endif

    <div class="header-2">
      <div id="menu-bar" class="fas fa-bars"></div>
      <nav class="navbar">
        <a href="{{ route('home') }}">Trang chủ</a>
        <a href="{{ route('search-product') }}">Sản phẩm</a>
        <a href="#footer">Liên hệ</a>
      </nav>
      <div class="icons">
        <a href="{{ route('cart') }}" style="position:relative" class="fas fa-shopping-cart">
          <span style="font-size:14px; color:red" class="quantity_cart">({{ countQuantityItemInCart() }})</span>
          {{-- countQuantityItemInCart --}}
        </a>
        <a href="{{ route('user-order') }}" class="fas fa-user-circle"></a>
      </div>
    </div>
  </header>
</body>

</html>
