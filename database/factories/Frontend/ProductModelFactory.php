<?php

namespace Database\Factories\Frontend;

use App\Models\Frontend\ProductModel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Frontend\ProductModel>
 */
class ProductModelFactory extends Factory
{
  protected $model = ProductModel::class;
  /**
   * Define the model's default state.
   *
   * @return array<string, mixed>
   */
  public function definition()
  {
    return [
      'name' => $this->faker->name,
      'price' => $this->faker->numberBetween($min = 1500, $max = 12000),
      'sale' => 0,
      'quantity' => 10,
      'image' => $this->faker->imageUrl($width = 200, $height = 200),
      'description' => $this->faker->text,
      'category_id' => 1,
    ];
  }
}