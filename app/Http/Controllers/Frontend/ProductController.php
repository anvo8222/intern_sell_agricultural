<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Backend\BrandModel;
use Illuminate\Http\Request;
use App\Models\Frontend\ProductModel;
use App\Models\Backend\CategoryModel;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    //
    $productInCategory = CategoryModel::all();
    $products = ProductModel::orderBy('id', 'desc')->paginate(12);
    return view('frontend.home.home', compact('productInCategory', 'products'));
  }
  public function showProductOfCategory($value)
  {
    $categoryId = CategoryModel::where('name', '=', $value)->first()->id;
    $products = ProductModel::where('category_id', '=', $categoryId)->orderBy('id', 'desc')->paginate(12);
    // dd($products);
    return view('frontend.productOfCategory.productOfCategory', compact('products', 'value'));
  }
  public function searchProduct(Request $request)
  {

    $categories = CategoryModel::get();
    $brands = BrandModel::get();
    $query = DB::table('products');

    if (!empty($request->name)) {
      $query->where('name', 'like', "%$request->name%");
    };
    if (!empty($request->category)) {
      $query->where('products.category_id', '=', $request->category);
    }
    if (!empty($request->brand)) {
      $query->where('products.brand_id', '=', $request->brand);
    }
    if (!empty($request->price)) {
      if ($request->price == 1) {
        $query->orderByRaw('(price - (price*sale/100)) asc');
      } else if ($request->price == 2) {
        $query->orderByRaw('(price - (price*sale/100)) desc');
      }
    }
    $products = $query->paginate(12);
    return view('frontend.searchProduct.searchProduct', compact('products', 'categories', 'brands'));
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
    $product = ProductModel::where('products.id', $id)
      ->join('categories', 'products.category_id',  '=', 'categories.id')
      ->join('brands', 'brands.id', '=', 'products.brand_id')
      ->select(
        'products.id',
        'products.name',
        'products.price',
        'products.image',
        'products.sale',
        'products.description',
        'products.quantity',
        'products.category_id',
        'products.brand_id',
        'categories.name as category_name',
        'brands.name as brand_name',
      )
      ->first();
    return view('frontend.productDetail.productDetail', compact('product'));
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
    //
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