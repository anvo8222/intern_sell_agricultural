<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\BrandModel;
use App\Models\Backend\CategoryModel;
use Illuminate\Http\Request;
use App\Models\Backend\ProductModel;
use App\Http\Requests\Backend\Product\AddProductRequest;
use App\Http\Requests\Backend\Product\UpdateProductRequest;
use Image;

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
    $products = ProductModel::paginate(8);
    return view('backend.dashboard.product.listProduct', compact('products'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $brands = BrandModel::all();
    $categories = CategoryModel::select('id', 'name')->get();
    return view('backend.dashboard.product.addProduct', compact('brands', 'categories'));
  }

  public function checkHasImage($request)
  {
    if ($request->hasFile('image')) {
      return true;
    } else {
      return false;
    }
  }
  public function createPathAndNameImage($request)
  {
    $path = "";
    $image_name = "";
    if ($this->checkHasImage($request)) {
      $image_name = time() . $request->image->getClientOriginalName();
      $pathActive = public_path('upload/backend/product/' . $request->category);
      $path = $pathActive . '/' . $image_name;
      if (!file_exists($pathActive)) {
        mkdir($pathActive, 0777, true);
      }
    }
    return ['path' => $path, 'image_name' => $image_name];
  }
  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(AddProductRequest $request)
  {
    $product = new ProductModel();
    $pathAndNameImage = $this->createPathAndNameImage($request);
    $path = "";
    if ($this->checkHasImage($request)) {
      $imageName = $pathAndNameImage['image_name'];
      $path = $pathAndNameImage['path'];
      $product->image = $imageName;
    }
    $product->name = $request->name;
    $product->price = $request->price;
    $product->sale = $request->sale;
    $product->quantity = $request->quantity;
    $product->category_id = $request->category;
    $product->brand_id = $request->brand;
    $product->description = $request->description;
    if ($product->save()) {
      if ($this->checkHasImage($request)) {
        Image::make($request->image)->resize(400, 400)->save($path);
      }
      // return redirect()->back()->withInput();
      return redirect(route('admin-product'));
    }
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $product = ProductModel::findOrFail($id);
    $brands = BrandModel::all();
    $categories = CategoryModel::select('id', 'name')->get();
    return view('backend.dashboard.product.editProduct', compact('product', 'brands', 'categories'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(UpdateProductRequest $request, $id)
  {
    $product = ProductModel::findOrFail($id);
    $pathAndNameImage = $this->createPathAndNameImage($request);
    $path = "";
    $inputs = $request->all();
    if ($this->checkHasImage($request)) {
      $imageName = $pathAndNameImage['image_name'];
      $path = $pathAndNameImage['path'];
      $inputs['image'] = $imageName;
    }
    $product->name = $request->name;
    $product->price = $request->price;
    $product->sale = $request->sale;
    $product->quantity = $request->quantity;
    $product->category_id = $request->category;
    $product->brand_id = $request->brand;
    $product->description = $request->description;
    if ($product->update()) {
      if ($this->checkHasImage($request)) {
        Image::make($request->image)->resize(400, 400)->save($path);
      }
      return redirect(route('admin-product'));
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
    ProductModel::where('id', $id)->delete();
    return redirect(route('admin-product'));
  }
}