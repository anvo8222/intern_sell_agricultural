<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderManagementModel extends Model
{
    use HasFactory;
    protected $table = "orders";
    public $timestamp = true;
}