<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\CategoryModel;
use App\Http\Requests\Backend\CategoryRequest;
use Image;

class CategoryController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $categories = CategoryModel::all();
    return view('backend/dashboard/category/category', compact('categories'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    //
    return view('backend/dashboard/category/addCategory');
  }

  protected function checkHasImage($request)
  {
    $isHasImage = false;
    if ($request->hasFile('image')) {
      $isHasImage = true;
    }
    return $isHasImage;
  }

  protected function createPathAndNameImage($request)
  {
    $path = "";
    $image_name = "";
    if ($this->checkHasImage($request)) {
      $image_name = time() . $request->image->getClientOriginalName();
      $pathActive = public_path('upload/backend/category');
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
  public function store(CategoryRequest $request)
  {
    $category = new CategoryModel();
    $this->createPathAndNameImage($request);
    $category->name = $request->name;
    if ($this->checkHasImage($request)) {
      $category->image = $this->createPathAndNameImage($request)['image_name'];
    }
    $category->description = $request->description;
    if ($category->save()) {
      if ($this->checkHasImage($request)) {
        Image::make($request->image)->resize(400, 400)->save($this->createPathAndNameImage($request)['path']);
      }
      return redirect(route('admin-category'));
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
    //
    $category =  CategoryModel::findOrFail($id);
    // dd($category);
    return view('backend/dashboard/category/editCategory', compact('category'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(CategoryRequest $request, $id)
  {
    $category = CategoryModel::findOrFail($id);
    $this->createPathAndNameImage($request);
    $category->name = $request->name;
    if ($this->checkHasImage($request)) {
      $category->image = $this->createPathAndNameImage($request)['image_name'];
    }
    $category->description = $request->description;
    if ($category->update()) {
      if ($this->checkHasImage($request)) {
        Image::make($request->image)->resize(400, 400)->save($this->createPathAndNameImage($request)['path']);
      }
      return redirect(route('admin-category'));
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
    CategoryModel::where('id', $id)->delete();
    return redirect(route('admin-category'));
  }
}