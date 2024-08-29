<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="{{ asset('backend/css/dashboard/table.css') }}">
  <title>Đơn hàng</title>
</head>

<body>
  @extends('backend.dashboard.layouts.app')
  @section('content')
    @if ($orders->isEmpty())
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
              <th>Địa chỉ</th>
              <th>Số điện thoại</th>
              <th>Mô tả</th>
              <th>Tổng tiền(VNĐ)</th>
              <th>Hành động</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($orders as $item)
              <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->email }}</td>
                <td>{{ $item->status }}</td>
                <td>{{ $item->address }}</td>
                <td>{{ $item->phone }}</td>
                <td>{{ $item->description }}</td>
                <td>{{ formatMoney($item->total) }}</td>
                <td>
                  <span class="action_btn">
                    <a href="{{ route('admin-order_detail', ['id' => $item->id]) }}" target="_blank">Xem</a>
                  </span>
                </td>
              </tr>
            @endforeach

          </tbody>
        </table>
      </div>
    @endif
  @endsection

</body>

</html>
