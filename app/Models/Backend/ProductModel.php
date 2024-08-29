<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Database\Factories\Backend\ProductFactory;

class ProductModel extends Model
{
    /** @return ProductFactory */
    protected static function newFactory()
    {
        return ProductFactory::new();
    }
    use HasFactory;
    protected $table = "products";
    public $timestamp = true;
}