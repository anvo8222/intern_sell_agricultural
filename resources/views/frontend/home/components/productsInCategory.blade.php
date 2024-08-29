<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>list category</title>
</head>

<body>
  <div class="box-container">
    {{-- {{ dd($productInCategory) }} --}}
    @foreach ($productInCategory as $item)
      <div class="box">
        <h3>{{ $item->name }}</h3>
        <img src="{{ asset('upload/backend/category/' . $item->image) }}" alt="image">
        <a href="{{ route('product-of-category', ['value' => $item->name]) }}" class="add-cart">Mua ngay</a>
      </div>
    @endforeach
  </div>
</body>

</html>
