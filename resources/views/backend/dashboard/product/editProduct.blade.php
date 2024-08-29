<!DOCTYPE html>
<html>

<head>
    <title>Product</title>
    <meta content="noindex, nofollow" name="robots">
    <link href="{{ asset('backend/css/dashboard/form.css') }}" rel="stylesheet">
</head>

<body>
    @extends('backend.dashboard.layouts.app')
    @section('content')
        <div class="wrapper">
            <div class="title">
                Cập nhật sản phẩm!
            </div>
            <form class="form" method="post" action="{{ route('admin-edit_product', ['id' => $product->id]) }}"
                enctype="multipart/form-data">
                @csrf
                <div class="inputfield">
                    <label>Tên sản phẩm<span style="color:red">*</span></label>
                    <input name="name" type="text" class="input"
                        value="{{ old('name') ? old('name') : $product->name }}">
                </div>
                @error('name')
                    <span style="color:Red">{{ $message }}</span> <br />
                @enderror
                <div class="inputfield">
                    <label>Hình ảnh<span style="color:red">*</span></label>
                    <input name="image" type="file" class="input">
                </div>
                @error('image')
                    <span style="color:Red">{{ $message }}</span> <br />
                @enderror
                <img style="width: 200px;height: 200px;"
                    src="{{ url('upload/backend/product/' . $product->category_id . '/' . $product->image) }}"
                    alt="{{ $product->image }}">
                <div class="inputfield">
                    <label>Giá sản phẩm<span style="color:red">*</span></label>
                    <input name="price" type="number" class="input"
                        value="{{ old('price') ? old('price') : $product->price }}">
                </div>
                @error('price')
                    <span style="color:Red">{{ $message }}</span> <br />
                @enderror

                <div class="inputfield">
                    <label>Giảm giá(%)<span style="color:red">*</span></label>
                    <input name="sale" type="number" min="0" max="100" class="input"
                        value="{{ old('sale') ? old('sale') : $product->sale }}">
                </div>
                @error('sale')
                    <span style="color:Red">{{ $message }}</span> <br />
                @enderror
                <div class="inputfield">
                    <label>Số lượng(kg)<span style="color:red">*</span></label>
                    <input name="quantity" type="number" min="0" class="input"
                        value="{{ old('quantity') ? old('quantity') : $product->quantity }}">
                </div>
                @error('quantity')
                    <span style="color:Red">{{ $message }}</span> <br />
                @enderror
                <div class="inputfield">
                    <label for="category">Danh mục<span style="color:red">*</span></label>
                    <select style="width:100%" id="category" name="category">
                        @foreach ($categories as $item)
                            @if ($product->category_id == $item->id)
                                <option selected value="{{ $item->id }}">{{ $item->name }}</option>
                            @else
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="inputfield">
                    <label for="brand">Thương hiệu<span style="color:red">*</span></label>
                    <select style="width:100%" id="brand" name="brand">
                        @foreach ($brands as $item)
                            @if ($product->brand_id == $item->id)
                                <option selected value="{{ $item->id }}">{{ $item->name }}</option>
                            @else
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="inputfield">
                    <label>Mô tả </label>
                    <textarea name="description" class="textarea">{{ old('description') ? old('description') : $product->description }}</textarea>
                </div>
                @error('description')
                    <span style="color:Red">{{ $message }}</span> <br />
                @enderror
                <div class="inputfield">
                    <input type="submit" value="Cập nhật sản phẩm" class="btn">
                </div>
            </form>
        </div>
    @endsection
</body>

</html>
