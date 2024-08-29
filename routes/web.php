<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\AuthController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\ProductController;
use  App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\OrderManagementController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Frontend\Cartcontroller;
use App\Http\Controllers\Frontend\ClientAccountController;
use App\Http\Controllers\Frontend\OrderController;
use App\Http\Middleware\AdminAuthentication;
use App\Http\Middleware\UserAuthentication;
use App\Http\Middleware\CheckUserIsLogined;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//admin
Route::group(
  ['prefix' => 'admin'],
  function () {
    Route::middleware([CheckUserIsLogined::class])->group(function () {
      Route::get('/login_Vonguyenthaian02012k', [AuthController::class, 'index']);
      Route::Post('/login_Vonguyenthaian02012k', [AuthController::class, 'login'])->name('admin-login');
    });
    Route::get('/logout_Vonguyenthaian02012k', [AuthController::class, 'logout'])->name('admin-logout');

    Route::middleware([AdminAuthentication::class])->group(function () {
      Route::get('/', function () {
        return view('backend/dashboard/home/home');
      })->name('admin-home');
      Route::controller(ProductController::class)->group(function () {
        Route::get('/product', 'index')->name('admin-product');
        Route::get('/add_product', 'create')->name('admin-add_product');
        Route::post('/add_product', 'store')->name('admin-add_product');
        Route::get('/edit_product/{id}', 'edit')->name('admin-edit_product');
        Route::post('/edit_product/{id}', 'update')->name('admin-edit_product');
        Route::get('/delete_product/{id}', 'destroy')->name('admin-delete_product');
      });
      // category
      Route::controller(CategoryController::class)->group(function () {
        Route::get('/category', 'index')->name('admin-category');
        Route::get('/add_category', 'create')->name('admin-add_category');
        Route::post('/add_category', 'store')->name('admin-add_category');
        Route::get('/edit_category/{id}', 'edit')->name('admin-edit_category');
        Route::post('/edit_category/{id}', 'update');
        Route::get('/delete_category/{id}', 'destroy')->name('admin-delete_category');
      });
      // brand
      Route::controller(BrandController::class)->group(function () {
        Route::get('/brand', 'index')->name('admin-brand');
        Route::get('/add_brand', 'create')->name('admin-add_brand');
        Route::post('/add_brand', 'store')->name('admin-add_brand');
        Route::get('/edit_brand/{id}', 'edit')->name('admin-edit_brand');
        Route::post('/edit_brand/{id}', 'update');
        Route::get('/delete_brand/{id}', 'destroy')->name('admin-delete_brand');
      });
      //User
      Route::controller(UserController::class)->group(function () {
        Route::get('/user', 'index')->name('admin-user');
      });
      //order
      Route::controller(OrderManagementController::class)->group(function () {
        Route::get('/order', 'index')->name('admin-order');
        Route::get('/order/detail/{id}', 'show')->name('admin-order_detail');
        Route::post('/order/detail/{id}', 'update')->name('admin-order_detail');
      });
    });
  }
);

Route::group(
  ['prefix' => ''],
  function () {
    Route::controller(App\Http\Controllers\Frontend\ProductController::class)->group(function () {
      Route::get('/', 'index')->name('home');
      Route::get('/detail/{id}', 'show')->name('product-detail');
      Route::get('/products/category/{value}', 'showProductOfCategory')->name('product-of-category');
      Route::get('/search', 'searchProduct')->name('search-product');
    });
    Route::controller(ClientAccountController::class)->group(function () {
      Route::middleware([CheckUserIsLogined::class])->group(function () {
        Route::get('/login', 'formLogin')->name('user-login');
        Route::post('/login', 'login')->name('user-login');
        Route::get('/register', 'formRegister')->name('user-register');
        Route::post('/register', 'register')->name('user-register');
        Route::get('/active-account/{id}/{token}', 'active')->name('user-active-account');
        // login but account no active// send email active
        Route::get('/active-account/{email}', 'activeLogin');
        // forgot password
        Route::get('/forgot-password', 'formForgotPassword')->name('user-forgot_password');
        Route::post('/forgot-password', 'forgotPassword')->name('user-forgot_password');
        Route::get('/change-password/{id}/{token}', 'formChangePassword')->name('user-change_password');
        Route::post('/change-password/{id}/{token}', 'changePassword')->name('user-change_password');
      });
      Route::get('/logout', 'logout')->name('user-logout');
    });
    Route::controller(Cartcontroller::class)->group(function () {
      Route::get('/cart', 'index')->name('cart');
      Route::post('/add_cart', 'addToCart')->name('add_to_cart');
      Route::post('/cart/quantity_up', 'cartQantityUp')->name('cart_quantity_up');
      Route::post('/cart/quantity_down', 'cartQantityDown')->name('cart_quantity_down');
      Route::post('/cart/deleteItem', 'cartDeleteItem')->name('cart_delete_item');
      Route::get('/cart/checkout', 'cartFormCkeckout')->name('cart_checkout');
      Route::post('/cart/checkout', 'cartCkeckout')->name('cart_checkout');
    });
  }
);

Route::group(
  ['prefix' => 'user'],
  function () {
    Route::middleware([UserAuthentication::class])->group(function () {
      Route::controller(OrderController::class)->group(function () {
        Route::get('/order', 'index')->name('user-order');
        Route::get('/order/no-active', 'showOrderNoActive')->name('user-order_no-active');
        Route::get('/order/active', 'showOrderActive')->name('user-order_active');
        Route::get('/order/shipping', 'showOrderShipping')->name('user-order_shipping');
        Route::get('/order/shipped', 'showOrderShipped')->name('user-order_shipped');
        Route::get('/order/canceled', 'showOrderCanceled')->name('user-order_canceled');
        Route::get('/order/cancel/{id}', 'cancelOrder')->name('user-cancel_order');
        Route::get('/order/order-again/{id}', 'orderAgain')->name('user-order_again');
      });

      Route::controller(ClientAccountController::class)->group(function () {
        Route::get('/profile', 'formProfile')->name('user-profile');
        Route::post('/update-profile', 'updateProfile')->name('user-profile_update');
        Route::get('/password', 'showFormPassword')->name('user-profile_password');
        Route::post('/password-update', 'updatePassword')->name('user-update_password');
      });
    });
  }
);