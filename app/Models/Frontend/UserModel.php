<?php

namespace App\Models\Frontend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    use HasFactory;
    protected $table = 'users';
    public $timestamp = true;
    protected $fillable = [
        'id', 'name', 'email', 'level', 'password', 'status', 'token', 'phone',
        'avatar', 'address'
    ];
}