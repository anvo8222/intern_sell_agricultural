<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Nông sản sạch</title>
</head>

<body>
  @extends('frontend.layouts.app')
  @section('content')
    <section class="category" id="category">
      <h1 style="margin-top:100px;" class="heading">Những sản phẩm trong <span>danh mục</span></h1>
      @include('frontend.home.components.productsInCategory', [
          'productInCategory' => $productInCategory,
      ])
    </section>
    <section class="list-product" id="list-product">
      <h1 class="heading">Sản phẩm <span>mới</span></h1>
      @include('frontend.home.components.newProducts', ['products' => $products])
    </section>
    {{-- {{ $products->links('pagination.myPagination') }} --}}
    {{ $products->links('pagination.myPagination') }}
  @endsection

  {{-- <script src="js/script.js"></script> --}}

</body>

</html>
