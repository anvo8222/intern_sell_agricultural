<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Sản phẩm trong danh mục</title>
  {{-- <link rel="stylesheet" href="{{ asset('frontend/css/home.css') }}"> --}}
</head>

<body>
  @extends('frontend.layouts.app')
  @section('content')
    <section class="list-product" id="list-product">
      <h1 class="heading">Sản phẩm <span>{{ $value }}</span></h1>
      @include('frontend.home.components.newProducts', ['products' => $products])
    </section>
    {{ $products->links('pagination.myPagination') }}
  @endsection
</body>

</html>
