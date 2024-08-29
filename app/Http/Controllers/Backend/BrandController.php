<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\BrandModel;
use App\Http\Requests\Backend\BrandRequest;

class BrandController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $brands = BrandModel::all();
    return view('backend.dashboard.brand.brand', compact('brands'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('backend/dashboard/brand/addBrand');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(BrandRequest $request)
  {
    //
    $brand = new BrandModel();
    $brand->name = $request->name;
    if ($brand->save()) {
      return redirect(route('admin-brand'));
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
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $brand =  BrandModel::findOrFail($id);
    // dd($category);
    return view('backend/dashboard/brand/editbrand', compact('brand'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(BrandRequest $request, $id)
  {
    $brand =  BrandModel::findOrFail($id);
    $brand->name = $request->name;
    if ($brand->update()) {
      return redirect(route('admin-brand'));
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
    BrandModel::where('id', $id)->delete();
    return redirect(route('admin-brand'));
  }
}