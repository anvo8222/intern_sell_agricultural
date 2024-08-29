<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Chi tiết sản phẩm</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">

</head>

<body>
  @extends('frontend.layouts.app')
  @section('content')
    <div class="small-container single-product">
      <div style="margin: 0 10%" class="row">
        <input type="hidden" value="{{ $product['id'] }}" class="product_id-hidden">
        <div class="col-2">
          <img src="{{ url('upload/backend/product/' . $product['category_id'] . '/' . $product['image']) }}"
            width="90%" id="ProductImg">
        </div>
        <div class="col-2 box" style="font-size: 16px">
          <div style="display: flex">
            <p style="min-width:100px">Danh mục:</p><a href="#">{{ $product['category_name'] }}</a>
          </div>
          <div style="display: flex">
            <p style="min-width:100px">Thương hiệu:</p><a href="#">{{ $product['brand_name'] }}</a>
          </div>
          <h1>{{ $product['name'] }}</h1>
          <b>SALE:{{ $product['sale'] }}%</b>
          <div>
            <span
              style="margin-right: 10px;color: rgb(126, 126, 126); text-decoration: line-through;">{{ formatMoney($product['price']) }}</span>
            <span>{{ formatMoney($product['price'] - ($product['price'] * $product['sale']) / 100) }}VNĐ</span>
          </div>
          <p>Tồn kho: {{ $product['quantity'] }}(kg)</p>
          <input type="hidden" class="product_stock-hidden" value="{{ $product['quantity'] }}">
          <input class="quantity" type="number" value="1">
          <a href="" class="add-cart">Thêm vào giỏ</a>
          <h3>Chi tiết sản phẩm</h3>
          <br>
          <p>{{ $product['description'] }}</p>
        </div>
      </div>
    </div>
  @endsection
</body>

@section('script')
  <script src="{{ asset('script/frontend/productDetail/addToCart.js') }}"></script>
@endsection

</html>
