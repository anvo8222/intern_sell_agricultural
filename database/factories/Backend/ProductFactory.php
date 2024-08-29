<?php

namespace Database\Factories\Backend;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Backend\ProductModel;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProductFactory extends Factory
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
      'name' => $this->faker->name(),
      'price' => $this->faker->numberBetween($min = 15, $max = 100) * 1000,
      'sale' => $this->faker->numberBetween($min = 0, $max = 100),
      'quantity' => $this->faker->numberBetween($min = 20, $max = 60),
      'image' => $this->faker->randomElement(['1674054977banner-1.jpg', '1674058424product-1.4.png', '1674067118product-5.png', '1674198259product-1.png']),
      'description' => $this->faker->paragraph,
      'category_id' => $this->faker->numberBetween($min = 1, $max = 4),
      'brand_id' => $this->faker->numberBetween($min = 1, $max = 2),
    ];
  }
}