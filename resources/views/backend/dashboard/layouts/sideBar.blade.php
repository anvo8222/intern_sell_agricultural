<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>SideBar</title>
</head>

<body>
  <section id="sidebar">
    <a href="{{ route('home') }}" class="brand">
      <i class='bx bxs-smile'></i>
      <span class="text">Trang chủ</span>
    </a>
    <ul class="side-menu top">
      <li class="{{ Route::current()->uri == 'admin' ? 'active' : '' }}">
        <a href="{{ route('admin-home') }}">
          <i class='bx bxs-dashboard'></i>
          <span class="text">Admin</span>
        </a>
      </li>
      <li class="{{ strpos(Route::current()->uri, 'product') ? 'active' : '' }}">
        <a href="{{ route('admin-product') }}">
          <i class='bx bxs-shopping-bag-alt'></i>
          <span class="text">Quản lý sản phẩm</span>
        </a>
      </li>
      <li class="{{ strpos(Route::current()->uri, 'category') ? 'active' : '' }}">
        <a href="{{ route('admin-category') }}">
          <i class='bx bxs-category'></i>
          <span class="text">Quản lý danh mục</span>
        </a>
      </li>
      <li class="{{ strpos(Route::current()->uri, 'brand') ? 'active' : '' }}">
        <a href="{{ route('admin-brand') }}">
          <i class='bx bxs-band-aid'></i>
          <span class="text">Quản lý thương hiệu</span>
        </a>
      </li>
      <li>
        <a href="{{ route('admin-user') }}">
          <i class='bx bx-user-pin'></i>
          <span class="text">Quản lý tài khoản</span>
        </a>
      </li>
      <li>
        <a href="{{ route('admin-order') }}">
          <i class='bx bx-transfer-alt'></i>
          <span class="text">Quản lý đơn hàng</span>
        </a>
      </li>

    </ul>
    <ul class="side-menu">

      <li>
        <a href="{{ route('admin-logout') }}" class="logout">
          <i class='bx bxs-log-out-circle'></i>
          <span class="text">Logout</span>
        </a>
      </li>
    </ul>
  </section>
</body>

</html>
