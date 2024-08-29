<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Database\Factories\Backend\UserFactory;

class UserModel extends Model
{
  use HasFactory;
  /** @return UserFactory */
  protected static function newFactory()
  {
    return UserFactory::new();
  }

  protected $table = 'users';
  public $timestamp = true;
}