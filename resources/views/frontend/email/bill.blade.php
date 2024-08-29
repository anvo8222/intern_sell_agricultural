<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Bill</title>
</head>

<body>
  <div style="margin: 0 auto">
    <h1>Xin chào {{ $name }}</h1>
    <p>
      Cảm ơn bạn đã đặt hàng tại Nông trại organic
    </p>
  </div>
  <table style="font-family: arial, sans-serif;border-collapse: collapse;width: 100%;">
    <tr>
      <th style="border: 1px solid #dddddd;text-align: left;padding: 8px;">
        Tên sản phẩm
      </th>
      <th style="border: 1px solid #dddddd;text-align: left;padding: 8px;">
        Giá sản phẩm
      </th>
      <th style="border: 1px solid #dddddd;text-align: left;padding: 8px;">
        Thành tiền
      </th>
    </tr>
    @foreach ($cart as $item)
      <tr>
        <td style="border: 1px solid #dddddd;text-align: left;padding: 8px;">{{ $item['name'] }} x
          {{ $item['quantity'] }}</td>
        <td style="border: 1px solid #dddddd;text-align: left;padding: 8px;">{{ formatMoney($item['priceAfterSale']) }}
        </td>
        <td style="border: 1px solid #dddddd;text-align: left;padding: 8px;">
          {{ formatMoney($item['priceAfterSale'] * $item['quantity']) }}</td>
      </tr>
    @endforeach
  </table>
  <p>Tổng: {{ formatMoney($totalPrice) }} VNĐ</p>
</body>

</html>
