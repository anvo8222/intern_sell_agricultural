<?php

namespace App\Models\Frontend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Database\Factories\Frontend\ProductModelFactory;

class ProductModel extends Model
{
  use HasFactory;
  /** @return ProductModelFactory */
  protected static function newFactory()
  {
    return ProductModelFactory::new();
  }

  protected $table = 'products';
  public $timestamp = true;
}