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
    <div class="table-data">
      <div class="order">
        <div class="head">
          <h3>Xem chi tiết đơn hàng</h3>
          <i class='bx bx-search'></i>
          <i class='bx bx-filter'></i>
        </div>
        {{-- {{ dd($order) }} --}}
        @foreach ($order as $item)
          <table>
            <thead>
              <tr>
                <th style="text-align:center">Sản phẩm</th>
                <th style="text-align:center">Giá</th>
                <th style="text-align:center">Giảm</th>
                <th style="text-align:center">Thành tiền</th>
                <th style="text-align:center">Hành động</th>
              </tr>
            </thead>
            <tbody>
              {{-- {{ dd($orderDetail) }} --}}
              @foreach ($orderDetail as $itemDetail)
                @if ($itemDetail->order_id === $item->id)
                  <tr>
                    <td>
                      <img
                        src="{{ url('upload/backend/product/' . $itemDetail->category_id . '/' . $itemDetail->image) }}">
                      <div>
                        <p>{{ $itemDetail->name }}</p>
                        <span>x{{ $itemDetail->quantity }}</span>
                        <b style="display: block">id: #{{ $itemDetail->product_id }}</b>
                      </div>
                    </td>
                    <td>{{ formatMoney($itemDetail->price) }}</td>
                    <td>-{{ $itemDetail->sale }}%</td>
                    <td>
                      {{ formatMoney(($itemDetail->price - ($itemDetail->price * $itemDetail->sale) / 100) * $itemDetail->quantity) }}
                    </td>
                    <td><a href="{{ route('product-detail', ['id' => $itemDetail->product_id]) }}"
                        class="status completed">Xem
                        sản phẩm</a></td>
                  </tr>
                @endif
              @endforeach
            </tbody>
          </table>
          <div>
            <p style="font-size:12px; color:#1775f1">Yêu cầu thêm: <span style="color:#004093">Không</span></p>
          </div>
          <div
            style="margin:20px 0;padding-bottom: 40px; display: flex; justify-content: space-between; border-bottom: 1px solid #ccc">
            <div style="margin:0 6px">
              <span>ID đơn hàng: #{{ $item->id }}</span>
              <strong style="color:#1775f1">Thành tiền: <strong
                  style="color:#004093">{{ formatMoney($item->total) }}VNĐ</strong></strong>
              <strong style="color:#1775f1">Trạng thái: <strong
                  style="color:#004093">{{ $item->status }}</strong></strong>
              <form action="{{ route('admin-order_detail', ['id' => $item->id]) }}" method="post"style="margin:10px 0">
                @csrf
                <select name="status">
                  <option value="">Cập nhật trạng thái:</option>
                  <option value="1">Xác nhận</option>
                  <option value="2">Đang giao</option>
                  <option value="3">Đã giao</option>

                </select>
                <input type="submit" value="Cập nhật"
                  style="padding:4px; font-size: 14px; background-color: #1775f1;color:white; border: none;cursor: pointer;">
              </form>
            </div>
            <div style="margin:0 6px">
              <strong style="color:#1775f1;font-size: 12px">Sđt: <strong
                  style="color:#004093;font-size: 12px">{{ $item->phone }}</strong></strong>
              <strong style="color:#1775f1;font-size: 12px">Gửi hàng đến:
                <strong style="color:#004093; font-size: 12px">{{ $item->address }} </strong>
              </strong>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  @endsection

</body>

</html>
