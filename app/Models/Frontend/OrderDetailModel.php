<?php

namespace App\Models\Frontend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetailModel extends Model
{
    use HasFactory;
    protected $table = "order_detail";
    public $timestamp = true;
}