<?php

namespace App\Models\Frontend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryModel extends Model
{
  // use HasFactory;
  protected $table = 'categories';
  public $timestamp = true;
  public function product()
  {
    return $this->hasMany(ProductModel::class, 'category_id');
  }
}