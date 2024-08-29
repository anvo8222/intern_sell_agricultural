<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('products', function (Blueprint $table) {
      $table->bigIncrements('id');
      $table->string('name');
      $table->double('price');
      $table->unsignedInteger('sale')->default(0);
      $table->integer('quantity');
      $table->string('image');
      $table->text('description');
      $table->unsignedBigInteger('category_id');
      $table->unsignedBigInteger('brand_id');
      $table->foreign('category_id')->references('id')->on('categories')->cascadeOnDelete();
      $table->foreign('brand_id')->references('id')->on('brands')->cascadeOnDelete();
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('products');
  }
};