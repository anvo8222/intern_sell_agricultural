<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Giỏ hàng</title>
  <link rel="stylesheet" href="{{ asset('frontend/css/cart.css') }}">
  <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
  @extends('frontend.layouts.app')
  @section('content')
    @if (session()->has('checkout-success'))
      <h2 style="color:rgb(0, 255, 55); font-size:30px; text-align:center;" class="alert alert-success">
        {!! session('checkout-success') !!}
      </h2>
    @endif
    @if (empty($cart))
      <div>
        <h1 style="text-align:center">Không có sản phẩm trong giỏ hàng</h1>
        <img style="margin:0 auto; display: block" src="{{ url('upload/frontend/cart/cartEmpty.png') }}" alt="">
        <span style="display: block; text-align: center; font-size:20px">Hãy nhanh tay chọn ngay sản phẩm yêu
          thích.</span>
      </div>
    @else
      <section id="cart_items">
        <div class="container">
          <div class="table-responsive cart_info">
            <table style="width:100%" class="table table-condensed">
              <thead>
                <tr class="cart_menu">
                  <td class="image">Sản phẩm</td>
                  <td class="description">Mô tả</td>
                  <td class="price">Đơn giá</td>
                  <td class="quantity">Số lượng</td>
                  <td class="total">Thành tiền(VNĐ)</td>
                  <td></td>

                </tr>
              </thead>
              <tbody>
                @foreach ($cart as $item)
                  <tr style="height: 100px;" class="item_cart">
                    <input class="idProductHidden" type="hidden" value="{{ $item['idProduct'] }}">
                    <td class="cart_product">
                      <a href=""><img style="width: 100px; height: 100px;"
                          src="{{ url('upload/backend/product/' . $item['idCategory'] . '/' . $item['image']) }}"
                          alt=""></a>
                    </td>
                    <td class="cart_description">
                      <h4><a href="">{{ $item['name'] }}</a></h4>
                      <p style="font-size:16px">Giá gốc:{{ formatMoney($item['price']) }} </p>
                      <p style="font-size:16px">Giảm:{{ formatMoney($item['sale']) }}% </p>
                    </td>
                    <td class="cart_price">
                      <p>{{ formatMoney($item['price'] - ($item['price'] * $item['sale']) / 100) }}VNĐ
                      </p>
                    </td>
                    <td class="cart_quantity">
                      <div class="cart_quantity_button">
                        <a class="cart_quantity_up" href="#"> + </a>
                        <input disabled value="{{ $item['quantity'] }}"
                          style="width:50px;text-align: center;margin-left: 4px;font-size: 18px;" autocomplete="off"
                          size="2">
                        <a class="cart_quantity_down" href="#"> - </a>
                      </div>
                    </td>
                    <td class="cart_total">
                      <p class="cart_total_price">
                        {{ formatMoney(($item['price'] - ($item['price'] * $item['sale']) / 100) * $item['quantity']) }}
                      </p>
                    </td>
                    <td class="cart_delete">
                      <a class="cart_quantity_delete" href="#"><i class="fa fa-times"></i></a>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <div class="total-price">
            <div class="total_area">
              <ul>
                <li class="total_price-all">Tổng tiền
                  <span>{{ formatMoney(totalPriceAllCart()) }}VNĐ</span>
                </li>
              </ul>
              <a style="text-decoration: none; color: green; float: right;font-size: 20px;margin: 20px 4px"
                href="{{ route('cart_checkout') }}">Đặt hàng</a>
            </div>
          </div>
        </div>
      </section>
    @endif
  @endsection
</body>

@section('script')
  <script src="{{ asset('script/frontend/cart.js') }}"></script>
@endSection

</html>
