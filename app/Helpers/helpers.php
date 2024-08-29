<?php
function formatMoney($value)
{
  return number_format($value, 0, '', '.');
}

function countQuantityItemInCart()
{
  $cart = session()->get('cart');
  $total = 0;
  if ($cart) {
    foreach ($cart as $item) {
      $total += $item['quantity'];
    }
  }
  return $total;
}
function totalPriceAllCart()
{
  $cart = session()->get('cart');
  $total = 0;
  if ($cart) {
    foreach ($cart as $item) {
      $total += $item['quantity'] * (float)$item['priceAfterSale'];
    }
  }
  return  $total;
}