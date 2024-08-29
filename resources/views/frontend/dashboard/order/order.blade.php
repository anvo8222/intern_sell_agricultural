a
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Lịch sử đặt hàng</title>
  <link rel="stylesheet" href="{{ asset('frontend/css/order.css') }}">
</head>

<body>
  @extends('frontend.dashboard.layouts.app')
  @section('content')
    @include('sweetalert::alert')
    <div class="table-data">
      <div class="order">
        <div class="head">
          <h3>Lịch sử đặt hàng</h3>
          <i class='bx bx-search'></i>
          <i class='bx bx-filter'></i>
        </div>
        @foreach ($order as $item)
          <table>
            <thead>
              <tr>
                <th>Sản phẩm</th>
                <th>Giá</th>
                <th>Giảm</th>
                <th>Thành tiền</th>
                <th></th>
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
              @if (strtolower($item->status) == 'chờ xác nhận')
                <a href="{{ route('user-cancel_order', ['id' => $item->id]) }}" style="display:block; color:red"
                  class="cancel-order">Huỷ đơn hàng</a>
              @endif
              @if (strtolower($item->status) == strtolower('Đã huỷ'))
                <a href="{{ route('user-order_again', ['id' => $item->id]) }}" style="display:block; color:red"
                  class="order_again">Đặt lại</a>
              @endif
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
@section('script')
  <script>
    $(document).ready(function() {
      $('.cancel-order').click(function(e) {
        e.preventDefault();
        swal({
            icon: 'warning',
            title: '',
            text: 'Bạn có chắn chắn muốn huỷ đơn hàng này?',
            buttons: ["No", "Yes"],
            dangerMode: true,
          })
          .then(isClose => {
            if (isClose) {
              window.location = $(this).attr('href');
            } else {}
          });
      })
      $('.order_again').click(function(e) {
        e.preventDefault();
        swal({
            icon: 'warning',
            title: '',
            text: 'Bạn có chắn chắn muốn đặt lại đơn hàng này?',
            buttons: ["No", "Yes"],
            dangerMode: true,
          })
          .then(isClose => {
            if (isClose) {
              window.location = $(this).attr('href');
            } else {}
          });
      })
    })
  </script>
@endsection


</html>
