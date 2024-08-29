<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Sản phẩm</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
  @if ($products->isEmpty())
    <h1 style="font-size:40px; color:red; text-align:center;margin: 40px 0;">Không tìm thấy sản phẩm nào!</h1>
  @else
    <div class="box-container">
      @foreach ($products as $item)
        <div class="box" href="productDetail.html">
          <span class="discount">-{{ $item->sale }}%</span>
          <a href="{{ route('product-detail', ['id' => $item->id]) }}">
            <img src="{{ url('upload/backend/product/' . $item->category_id . '/' . $item->image) }}" alt="image">
          </a>
          <h3 style="font-size: 20px;">{{ $item->name }}</h3>
          <div class="price"> {{ formatMoney($item->price - $item->price * ($item->sale / 100)) }}VNĐ <span>
              {{ formatMoney($item->price) }}VNĐ</span> </div>
          <div class="quantity">
            <span>Số lượng : </span>
            <input class="quantity_value" type="number" min="1" max="1000" value="1">
            <span> /kg </span>
          </div>
          <div class="quantity">
            <span>Kho : </span>
            <span> {{ $item->quantity }}<label>kg</label></span>

          </div>
          <input class="product_id-hidden" hidden value="{{ $item->id }}">
          <input class="product_stock-hidden" hidden value="{{ $item->quantity }}">
          <span value="1" class="add-cart">Thêm vào giỏ</span>
        </div>
      @endforeach
    </div>
  @endif

</body>
@section('script')
  <script src="{{ asset('script/frontend/addToCart.js') }}"></script>
@endsection

</html>
