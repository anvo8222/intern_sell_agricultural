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
    Schema::create('users', function (Blueprint $table) {
      $table->bigIncrements('id');
      $table->string('name')->nullable();
      $table->string('email')->unique();
      $table->unsignedInteger('level')->default(0);
      $table->string('password');
      $table->char('status')->default('no-active');
      $table->string('token')->nullable();
      $table->double('phone')->nullable();
      $table->string('avatar')->nullable();
      $table->string('address')->nullable();
      $table->rememberToken()->nullable();
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
    Schema::dropIfExists('users');
  }
};