<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {

        Schema::create('classes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description');
            $table->float('price');
            $table->integer('available_on');
            $table->string('image_path');
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('bundles', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description');
            $table->float('price');
            $table->string('image_path');
            $table->timestamps();
        });

        Schema::create('bundle_product', function (Blueprint $table) {
            $table->id();
            $table->foreignId('bundle_id')->constrained('bundles')->onDelete('cascade');
            $table->foreignId('product_id')->constrained('products')->onDelete('cascade');
        });

        Schema::create('discounts', function (Blueprint $table) {
            $table->id();
            $table->boolean('enabled');
            $table->boolean('reusable');
            $table->boolean('used');
            $table->dateTime('valid_since');
            $table->float('percentage_amount');
            $table->boolean('cumulative');
            $table->timestamps();
        });

        Schema::create('commands', function (Blueprint $table) {
            $table->id();
            $table->integer('status');
            $table->integer('total');
            $table->foreignId('user_id')->constrained('users', 'id')->onDelete('cascade');
            $table->foreignId('discount_id')->nullable()->constrained('discounts')->onDelete('set null');
            $table->timestamps();
        });

        Schema::create('deliveries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('command_id')->constrained('commands')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('class_product', function (Blueprint $table) {
            $table->id();
            $table->foreignId('class_id')->constrained('classes')->onDelete('cascade');
            $table->foreignId('product_id')->constrained('products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('class_product');
        Schema::dropIfExists('deliveries');
        Schema::dropIfExists('commands');
        Schema::dropIfExists('discounts');
        Schema::dropIfExists('bundle_product');
        Schema::dropIfExists('bundles');
        Schema::dropIfExists('products');
        Schema::dropIfExists('categories');
        Schema::dropIfExists('classes');
    }
};
