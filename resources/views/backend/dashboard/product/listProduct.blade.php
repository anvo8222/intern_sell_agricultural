<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('backend/css/dashboard/table.css') }}">
    <title>Product</title>
    <style>
        .add_product:hover {
            color: red !important;
        }
    </style>
</head>

<body>
    @extends('backend.dashboard.layouts.app')
    @section('content')

        @if ($products->isEmpty())
            <div>
                <span style="color:orange; font-weight:bold;font-size: 40px">Sản phẩm rỗng!</span>
                <a style="display: block; color: rgb(0, 128, 255)" href="{{ route('admin-add_product') }}">Thêm sản phẩm</a>
            </div>
        @else
            <div class="table_responsive">
                <a class="add_product" href="{{ route('admin-add_product') }}"
                    style="color:rgb(25, 171, 224);font-size: 20px">Thêm sản phẩm</a>
                <table>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Tên sản phẩm</th>
                            <th>Hình ảnh</th>
                            <th>Giá(VNĐ)</th>
                            <th>Sale</th>
                            <th>Số lượng(KG)</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->name }}</td>
                                <td><img src="{{ url('upload/backend/product/' . $item->category_id . '/' . $item->image) }}"
                                        alt="{{ $item->name }}"></td>
                                <td>{{ $item->price }}</td>
                                <td>{{ $item->sale }}</td>
                                <td>{{ $item->quantity }}</td>
                                <td><span class="action_btn">
                                        <a href="{{ route('admin-edit_product', ['id' => $item->id]) }}">Edit</a>
                                        <a href="{{ route('admin-delete_product', ['id' => $item->id]) }}">Delete</a>
                                    </span></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
        @endif
        </div>
        <div class="pagination">
            {{ $products->links('vendor.pagination.semantic-ui') }}
        </div>
    @endsection
</body>

</html>
