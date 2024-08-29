<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Tìm kiếm</title>
  <style>
    .search input {
      width: 250px;
      height: 30px;
      border: 0;
      outline: none;
      padding: 0 10px;
      border-right: 1px solid silver;
    }

    input:focus::placeholder {
      opacity: 0;
    }

    .search select {
      width: auto;
      height: 30px;
      border: 0;
      outline: none;
      font-size: 16px;

    }

    .search button {
      border: 0;
      outline: none;
      padding: 0 10px;
      background-color: #cd201f;
      color: white;
      cursor: pointer;
      font-size: 16px;
    }

    .search button:hover {
      background-color: #b3201f;
    }
  </style>
</head>

<body>
  @extends('frontend.layouts.app')
  @section('content')
    <section class="list-product" id="list-product">
      <h1 class="heading">Các sản phẩm được tìm thấy</h1>
      <div class="search" style="margin:20px 0">
        <h1>Search Form</h1>
        <form action="{{ route('search-product') }}">
          @csrf
          <input type="text" name="name" placeholder="Search..." value="{{ old('name') }}">
          <select name="category">
            <option value="">Danh mục</option>
            @foreach ($categories as $item)
              <option style="color:#27ae60" value="{{ $item->id }}">{{ $item->name }}</option>
            @endforeach
          </select>
          <select name="brand">
            <option value="">Thương hiệu</option>
            @foreach ($brands as $item)
              <option style="color:#27ae60" value="{{ $item->id }}">{{ $item->name }}</option>
            @endforeach
          </select>
          <select name="price">
            <option value="">Giá</option>
            <option value="1">Thấp -> cao</option>
            <option value="2">Cao -> thấp</option>
          </select>
          <button type="submit">Search</button>
        </form>
      </div>
      @include('frontend.home.components.newProducts', ['products' => $products])
    </section>
    {{ $products->links('pagination.myPagination') }}
  @endsection
</body>

</html>
