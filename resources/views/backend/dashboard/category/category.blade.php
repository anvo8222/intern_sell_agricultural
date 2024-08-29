<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('backend/css/dashboard/table.css') }}">
    <title>Category</title>
</head>

<body>
    @extends('backend.dashboard.layouts.app')
    @section('content')
        @if ($categories->isEmpty())
            <div>
                <span style="color:orange; font-weight:bold;font-size: 40px">Danh mục rỗng!</span>
                <a style="display: block; color: rgb(0, 128, 255)" href="{{ route('admin-add_category') }}">Thêm danh mục</a>
            </div>
        @else
            <div class="table_responsive">
                <table>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Tên danh mục</th>
                            <th>Ảnh</th>
                            <th>Mô tả</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->name }}</td>
                                <td>
                                    <img src="{{ url('upload/backend/category/' . $item->image) }}" alt="">
                                </td>
                                <td class="description"><span>{{ $item->description }}</span></td>
                                <td>
                                    <span class="action_btn">
                                        <a href="{{ route('admin-edit_category', ['id' => $item->id]) }}">Edit</a>
                                        <a href="{{ route('admin-delete_category', ['id' => $item->id]) }}">Delete</a>
                                    </span>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
            <a style="display: block; color: rgb(0, 128, 255)" href="{{ route('admin-add_category') }}">Thêm danh mục</a>
        @endif
    @endsection

</body>

</html>
