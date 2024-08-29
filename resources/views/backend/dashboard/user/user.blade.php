<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="{{ asset('backend/css/dashboard/table.css') }}">
  <title>Tài khoản</title>
</head>

<body>
  @extends('backend.dashboard.layouts.app')
  @section('content')
    @if ($users->isEmpty())
      <div>
        <span style="color:orange; font-weight:bold;font-size: 40px">Khônng có tài khoản !</span>
        <a style="display: block; color: rgb(0, 128, 255)" href="{{ route('admin-add_category') }}">Thêm danh mục</a>
      </div>
    @else
      <div class="table_responsive">
        <table>
          <thead>
            <tr>
              <th>#</th>
              <th>Tên</th>
              <th>Email</th>
              <th>Trạng thái</th>
              <th>Ảnh</th>
              <th>Mật khẩu</th>
              <th>Địa chỉ</th>
              <th>Số điện thoại</th>
              {{-- <th>Hành động</th> --}}
            </tr>
          </thead>
          <tbody>
            @foreach ($users as $item)
              <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->email }}</td>
                <td>{{ $item->status }}</td>
                <td>
                  <img
                    src="{{ $item->avatar ? url('upload/frontend/avatar/' . $item->avatar) : 'https://images.unsplash.com/photo-1517841905240-472988babdf9?ixid=MnwxMjA3fDB8MHxzZWFyY2h8NHx8cGVvcGxlfGVufDB8fDB8fA%3D%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60' }}"
                    alt="{{ $item->name }}">
                </td>
                <td class="description"><span>{{ $item->password }}</span></td>
                <td class="description"><span>{{ $item->address }}</span></td>
                <td class="description"><span>{{ $item->phone }}</span></td>
                {{-- <td>
                  <span class="action_btn">
                    <a href="{{ route('admin-edit_category', ['id' => $item->id]) }}">Edit</a>
                    <a href="{{ route('admin-delete_category', ['id' => $item->id]) }}">Delete</a>
                  </span>
                </td> --}}
              </tr>
            @endforeach

          </tbody>
        </table>
      </div>
    @endif
  @endsection

</body>

</html>
