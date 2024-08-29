<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Frontend\OrderModel;
use Illuminate\Support\Facades\Auth;
use Alert;

class OrderController extends Controller
{
  public function index()
  {
    $userId = Auth::id();
    $order = OrderModel::where('user_id', $userId)->orderBy('created_at', 'desc')->get();
    $orderDetail = OrderModel::where('user_id', $userId)
      ->join('order_detail', 'order_detail.order_id', '=', 'orders.id')
      ->join('products', 'products.id', '=', 'order_detail.product_id')
      ->select(
        'products.id as product_id',
        'products.category_id',
        'products.image',
        'products.name',
        'order_detail.order_id',
        'order_detail.quantity',
        'order_detail.price',
        'order_detail.sale',
        'products.description as product_description',
        'orders.description as order_description'
      )
      ->get();
    return view('frontend.dashboard.order.order', compact('order', 'orderDetail'));
  }
  public function showOrderNoActive()
  {
    $userId = Auth::id();
    $order = OrderModel::where('user_id', $userId)
      ->where('status', 'Chờ xác nhận')
      ->orderBy('created_at', 'desc')->get();
    $orderDetail = OrderModel::where('user_id', $userId)
      ->where('status', 'Chờ xác nhận')
      ->join('order_detail', 'order_detail.order_id', '=', 'orders.id')
      ->join('products', 'products.id', '=', 'order_detail.product_id')
      ->select(
        'products.id as product_id',
        'products.category_id',
        'products.image',
        'products.name',
        'order_detail.order_id',
        'order_detail.quantity',
        'order_detail.price',
        'order_detail.sale',
        'products.description as product_description',
        'orders.description as order_description'
      )
      ->get();
    return view('frontend.dashboard.order.order', compact('order', 'orderDetail'));
  }
  public function showOrderActive()
  {
    $userId = Auth::id();
    $order = OrderModel::where('user_id', $userId)
      ->where('status', 'Đã xác nhận')
      ->orderBy('created_at', 'desc')->get();
    $orderDetail = OrderModel::where('user_id', $userId)
      ->where('status', 'Đã xác nhận')
      ->join('order_detail', 'order_detail.order_id', '=', 'orders.id')
      ->join('products', 'products.id', '=', 'order_detail.product_id')
      ->select(
        'products.id as product_id',
        'products.category_id',
        'products.image',
        'products.name',
        'order_detail.order_id',
        'order_detail.quantity',
        'order_detail.price',
        'order_detail.sale',
        'products.description as product_description',
        'orders.description as order_description'
      )
      ->get();
    return view('frontend.dashboard.order.order', compact('order', 'orderDetail'));
  }
  public function showOrderShipping()
  {
    $userId = Auth::id();
    $order = OrderModel::where('user_id', $userId)
      ->where('status', 'Đang giao')
      ->orderBy('created_at', 'desc')->get();
    $orderDetail = OrderModel::where('user_id', $userId)
      ->where('status', 'Đang giao')
      ->join('order_detail', 'order_detail.order_id', '=', 'orders.id')
      ->join('products', 'products.id', '=', 'order_detail.product_id')
      ->select(
        'products.id as product_id',
        'products.category_id',
        'products.image',
        'products.name',
        'order_detail.order_id',
        'order_detail.quantity',
        'order_detail.price',
        'order_detail.sale',
        'products.description as product_description',
        'orders.description as order_description'
      )
      ->get();
    return view('frontend.dashboard.order.order', compact('order', 'orderDetail'));
  }
  public function showOrderShipped()
  {
    $userId = Auth::id();
    $order = OrderModel::where('user_id', $userId)
      ->where('status', 'Đã giao')
      ->orderBy('created_at', 'desc')->get();
    $orderDetail = OrderModel::where('user_id', $userId)
      ->where('status', 'Đã giao')
      ->join('order_detail', 'order_detail.order_id', '=', 'orders.id')
      ->join('products', 'products.id', '=', 'order_detail.product_id')
      ->select(
        'products.id as product_id',
        'products.category_id',
        'products.image',
        'products.name',
        'order_detail.order_id',
        'order_detail.quantity',
        'order_detail.price',
        'order_detail.sale',
        'products.description as product_description',
        'orders.description as order_description'
      )
      ->get();
    return view('frontend.dashboard.order.order', compact('order', 'orderDetail'));
  }
  public function showOrderCanceled()
  {
    $userId = Auth::id();
    $order = OrderModel::where('user_id', $userId)
      ->where('status', 'Đã huỷ')
      ->orderBy('created_at', 'desc')->get();
    $orderDetail = OrderModel::where('user_id', $userId)
      ->where('status', 'Đã huỷ')
      ->join('order_detail', 'order_detail.order_id', '=', 'orders.id')
      ->join('products', 'products.id', '=', 'order_detail.product_id')
      ->select(
        'products.id as product_id',
        'products.category_id',
        'products.image',
        'products.name',
        'order_detail.order_id',
        'order_detail.quantity',
        'order_detail.price',
        'order_detail.sale',
        'products.description as product_description',
        'orders.description as order_description'
      )
      ->get();
    return view('frontend.dashboard.order.order', compact('order', 'orderDetail'));
  }
  public function cancelOrder($id)
  {
    $userId = Auth::id();
    if (OrderModel::where('id', $id)
      ->where('user_id', $userId)
      ->update(['status' => "Đã huỷ"])
    ) {
      Alert::success('Bạn đã huỷ đơn hàng thành công!');
      return redirect()->back();
    }
  }
  public function orderAgain($id)
  {
    $userId = Auth::id();
    if (OrderModel::where('id', $id)
      ->where('user_id', $userId)
      ->update(['status' => "Chờ xác nhận"])
    ) {
      Alert::success('Bạn đã đặt hàng thành công!');
      return redirect()->back();
    }
  }
}