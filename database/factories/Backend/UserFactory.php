<?php

namespace Database\Factories\Backend;

use Illuminate\Database\Eloquent\Factories\Factory;
use  App\Models\Backend\UserModel;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class UserFactory extends Factory
{

  protected $model = UserModel::class;
  /**
   * Define the model's default state.
   *
   * @return array<string, mixed>
   */
  public function definition()
  {
    return [];
  }
}