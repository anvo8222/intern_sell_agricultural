<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="{{ asset('frontend/css/cartCheckout.css') }}">
  <title>Thanh toán giỏ hàng</title>
</head>

<body>
  @extends('frontend.layouts.app')
  @section('content')
    <div class="wrapper">
      <div class="container">
        <div class="title">Nhập thông tin đặt hàng</div>
        <form acction="{{ route('cart_checkout') }}" method="post" class="input-form">
          @csrf
          <div class="section">
            <div class="items">
              <label class="label">Tên</label>
              <input type="text" name="name" class="input" placeholder="tên" value="{{ $user->name }}">
              @error('name')
                <span style="color:#ff3457">{{ $message }}</span> <br />
              @enderror
            </div>
          </div>
          <div class="section">
            <div class="items">
              <label class="label">Số điện thoại</label>
              <input name="phone" type="text" class="input" placeholder="số điện thoại" value="{{ $user->phone }}">
              @error('phone')
                <span style="color:#ff3457">{{ $message }}</span> <br />
              @enderror
            </div>
          </div>
          <div class="section">
            <div class="items">
              <label class="label">Email</label>
              <input name="email" type="text" class="input" placeholder="email" value="{{ $user->email }}">
              @error('email')
                <span style="color:#ff3457">{{ $message }}</span> <br />
              @enderror
            </div>
          </div>
          <div class="section">
            <div class="items">
              <label class="label">Địa chỉ</label>
              <input name="address" type="text" class="input" placeholder="địa chỉ" value="{{ $user->address }}">
              @error('address')
                <span style="color:#ff3457">{{ $message }}</span> <br />
              @enderror
            </div>
          </div>
          <div class="section">
            <div class="items">
              <textarea name="content" cols="50" rows="5" placeholder="Quý khách có yêu cầu gì thêm?"></textarea>
            </div>
          </div>
          <input class="btn" type="submit" value="Đặt hàng" />
        </form>
      </div>
      <div class="container right">
        <h4>Số lượng:
          <span class="price" style="color:black">
            <i class="fa fa-shopping-cart"></i>
            <b>{{ $quantityInCart }}</b>
          </span>
        </h4>
        @foreach ($cart as $item)
          <div class="cart-detail">
            <a href="#">{{ $item['name'] }}</a>
            <p><span style="font-size:14px; margin-top:2px">x{{ $item['quantity'] }}
              </span>
              <span class="price">{{ formatMoney($item['priceAfterSale'] * $item['quantity']) }}
              </span>
            </p>
          </div>
        @endforeach
        <hr>
        <p>Thành tiền <span class="price" style="color:black"><strong>{{ formatMoney($totalPriceInCart) }}
              VNĐ</strong></span></p>
      </div>
    </div>
  @endSection

</body>

</html>
