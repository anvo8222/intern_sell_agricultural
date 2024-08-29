<section id="sidebar">
  <a href="{{ route('home') }}" class="brand"><i class='bx bxs-smile icon'></i>Trang chủ</a>
  <ul class="side-menu">
    <li><a href="#" class="active"><i class='bx bxs-dashboard icon'></i> Dashboard</a></li>
    <li class="divider" data-text="chính">Chính</li>
    <li>
      <a href="#"><i class='bx bxs-inbox icon'></i> Lịch sử đặt hàng <i
          class='bx bx-chevron-right icon-right'></i></a>
      <ul class="side-dropdown">
        <li><a href="{{ route('user-order') }}">Tất cả đơn hàng</a></li>
        <li><a href="{{ route('user-order_no-active') }}">Đơn hàng chờ xác nhận</a></li>
        <li><a href="{{ route('user-order_active') }}">Đơn hàng đã xác nhận</a></li>
        <li><a href="{{ route('user-order_shipping') }}">Đơn hàng đang giao</a></li>
        <li><a href="{{ route('user-order_shipped') }}">Đơn hàng đã giao</a></li>
        <li><a href="{{ route('user-order_canceled') }}">Đơn hàng đã huỷ</a></li>
      </ul>
    </li>
    <li>
      <a href="#"><i class='bx bxs-user-pin icon'></i> Tài khoản của tôi <i
          class='bx bx-chevron-right icon-right'></i></a>
      <ul class="side-dropdown">
        <li><a href="{{ route('user-profile') }}">Chỉnh sửa hồ sơ</a></li>
        <li><a href="{{ route('user-profile_password') }}">Đổi mật khẩu</a></li>
      </ul>
    </li>

  </ul>

</section>
