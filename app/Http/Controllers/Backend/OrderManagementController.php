<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\OrderManagementModel;
use App\Models\Frontend\OrderModel;
use Illuminate\Http\Request;

class OrderManagementController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $orders = OrderManagementModel::all();
    return view('backend.dashboard.order.order', compact('orders'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    //
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    //
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    $order = OrderModel::where('id', $id)->get();

    $orderDetail = OrderModel::where('order_id', $order[0]['id'])
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
    return view('backend.dashboard.order.orderDetail', compact('order', 'orderDetail'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    $order = OrderModel::findOrFail($id);
    if ($request->status == 1) {
      $order->status = "Đã xác nhận";
    }
    if ($request->status == 2) {
      $order->status = "Đang giao";
    }
    if ($request->status == 3) {
      $order->status = "Đã giao";
    }
    if ($order->save()) {
      return redirect()->back();
    }
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    //
  }
}