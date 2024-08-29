<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\NotifyMail;
use Illuminate\Http\Request;
use App\Models\Frontend\ProductModel;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Frontend\Checkout\CheckoutRequest;
use App\Models\Frontend\OrderModel;
use App\Models\Frontend\OrderDetailModel;
use Mail;

class Cartcontroller extends Controller
{
  public function index()
  {
    $cart = session()->get('cart', []);
    // dd($cart);
    return view('frontend.cart.cart', compact('cart'));
  }

  public function addToCart()
  {
    $productId = $_POST['productId'];
    $quantity = (int)$_POST['quantity'];
    $product = ProductModel::findOrFail($productId);
    $product = [
      'idProduct' => $productId,
      'name' => $product->name,
      'quantity' => $quantity,
      'price' => $product->price,
      'sale' => $product->sale,
      'priceAfterSale' => round($product->price - $product->price * ($product->sale / 100), 1),
      'idCategory' => $product->category_id,
      'image' => $product->image,
    ];
    $cart = session()->get('cart', []);
    $isProductInCart = false;
    for ($i = 0; $i < count($cart); $i++) {
      if ($cart[$i]['idProduct'] == $productId) {
        $isProductInCart = true;
        $cart[$i]['quantity'] = $cart[$i]['quantity'] + $quantity;
        break;
      }
    };
    if (!$isProductInCart) {
      $cart[] = $product;
    };
    session()->put('cart', $cart);
    return response()->json(['status_code' => '200', 'quantityCart' => countQuantityItemInCart()]);
  }
  public function cartQantityUp()
  {
    $productId = $_POST['idProduct'];
    $productStock = ProductModel::findOrfail($productId)->quantity;
    $cart = session()->get('cart');
    $errMessage = 'Số lượng của sản phẩm này không được vượt quá: ';
    if ($cart) {
      for ($i = 0; $i < count($cart); $i++) {
        if ($cart[$i]['idProduct'] == $productId) {
          if ($cart[$i]['quantity'] >= $productStock) {
            // return response()->json(['error' => 'Số lượng của sản phẩm này không được vượt quá ' . $productStock], 404);
            return response()->json(['status_error' => true, 'error' => $errMessage . $productStock]);
          } else {
            $cart[$i]['quantity'] = $cart[$i]['quantity'] + 1;
            session()->put('cart', $cart);
            return response()->json([
              'status_error' => false,
              'quantity' => $cart[$i]['quantity'],
              'priceItem' => $cart[$i]['quantity'] * $cart[$i]['priceAfterSale'],
              'totalPriceAllCart' => totalPriceAllCart(),
              'quantityCart' => countQuantityItemInCart(),
            ]);
          }
        }
      };
    }
  }

  public function cartQantityDown()
  {
    $productId = $_POST['idProduct'];
    $cart = session()->get('cart');
    if ($cart) {
      for ($i = 0; $i < count($cart); $i++) {
        if ($cart[$i]['idProduct'] == $productId) {
          $cart[$i]['quantity'] = $cart[$i]['quantity'] - 1;
          session()->put('cart', $cart);
          return response()->json([
            'status_error' => false,
            'quantity' => $cart[$i]['quantity'],
            'priceItem' => $cart[$i]['quantity'] * $cart[$i]['priceAfterSale'],
            'totalPriceAllCart' => totalPriceAllCart(),
            'quantityCart' => countQuantityItemInCart(),
          ]);
          // $totalItem += (float)$cart[$i]['priceProduct'] * (int)$cart[$i]['quantityProduct'];
        }
      };
    }
  }

  public function cartDeleteItem()
  {
    $productId = $_POST['idProduct'];
    $cart = session()->get('cart');
    $deleted = false;
    for ($i = 0; $i < count($cart); $i++) {
      if ($cart[$i]['idProduct'] == $productId) {
        unset($cart[$i]);
        $deleted = true;
        break;
      }
    };
    $cart = array_values($cart);
    session()->put('cart', $cart);
    return response()->json([
      'cart' => $cart,
      'deleted' => $deleted,
      'totalPriceAllCart' => totalPriceAllCart(),
      'quantityCart' => countQuantityItemInCart(),

    ]);
  }
  // checkout
  public function cartFormCkeckout()
  {
    if (!Auth::check()) {
      return redirect(route('user-login'));
    } else if (!session()->get('cart')) {
      return redirect(route('cart'));
    } else {
      $user = Auth::user();
      $quantityInCart = countQuantityItemInCart();
      $totalPriceInCart = totalPriceAllCart();
      $cart = session()->get('cart');
      return view('frontend.cart.cartCheckout', compact('user', 'quantityInCart', 'totalPriceInCart', 'cart'));
    }
  }
  public function cartCkeckout(CheckoutRequest $request)
  {
    $name = $request->name;
    $phone = $request->phone;
    $email = $request->email;
    $address = $request->address;
    $content = $request->content;
    // dd($request->all());
    $data = [
      'name' => $name,
      'cart' => session()->get('cart'),
      'totalPrice' => totalPriceAllCart(),
    ];
    if ($data['cart']) {
      $userId = Auth::id();
      $order = new OrderModel();
      $order->user_id = $userId;
      $order->name = $name;
      $order->address = $address;
      $order->phone = $phone;
      $order->email = $email;
      $order->description = $content;
      $order->total = totalPriceAllCart();
      if ($order->save()) {
        $orderId = $order->id;
        foreach ($data['cart'] as $item) {
          $orderDetail = new OrderDetailModel();
          $orderDetail->order_id = $orderId;
          $orderDetail->product_id = $item['idProduct'];
          $orderDetail->quantity = $item['quantity'];
          $orderDetail->price = $item['price'];
          $orderDetail->sale = $item['sale'];
          if ($orderDetail->save()) {
            $product = ProductModel::findOrFail($item['idProduct']);
            $product->quantity = $product->quantity - $item['quantity'];
            $product->update();
          }
        }
        Mail::to($request->email)->send(new NotifyMail($data));
        session()->forget('cart');
        return redirect(route('cart'))->with([
          'checkout-success' =>
          'Đặt hàng thành công! Vui lòng kiểm tra hoá đơn tại Email và xem thông tin đơn hàng tại <a href="/user/order">đây</a> ',
        ]);
      }
    } else {
      return redirect(route('cart'));
    }
  }
}