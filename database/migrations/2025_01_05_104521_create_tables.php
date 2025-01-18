<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        // Create ADMINS table
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->string('username');
            $table->string('password');
            $table->decimal('fm_prize', 10, 2)->default(0);
            $table->decimal('fm_target', 10, 2)->default(0);
            $table->decimal('delivery_cost', 10, 2)->default(0);
            $table->timestamps();
        });

        // Create CLASSROOMS table
        Schema::create('classrooms', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        // Create ORDER_STATUSES table
        Schema::create('order_statuses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        // Create ORDERS table
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer('number')->unique();
            $table->timestamp('delivery_time')->nullable();
            $table->decimal('used_portfolio', 10, 2)->default(0);
            $table->decimal('delivery_cost', 10, 2)->default(0);
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('order_status_id')->constrained('order_statuses');
            $table->foreignId('classroom_id')->nullable()->constrained('classrooms');
            $table->timestamps();
        });

        // Create PRODUCT_TYPES table
        Schema::create('product_types', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        // Create PRODUCTS table
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('image')->nullable();
            $table->string('name');
            $table->text('description');
            $table->decimal('price', 10, 2);
            $table->decimal('perc_discount', 5, 2)->nullable();
            $table->foreignId('product_type_id')->constrained('product_types');
            $table->timestamps();
        });

        // Create CARTS table
        Schema::create('products_in_carts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('product_id')->constrained('products');
            $table->integer('quantity');
            $table->timestamps();
        });

        // Create PRODUCT_IN_ORDER table
        Schema::create('products_in_order', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained('orders');
            $table->foreignId('product_id')->constrained('products');
            $table->decimal('bought_price', 10, 2);
            $table->decimal('bought_perc_discount', 5, 2)->nullable();
            $table->integer('quantity');
            $table->timestamps();
        });

        // Create RATINGS table
        Schema::create('ratings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('product_id')->constrained('products');
            $table->integer('rating');
            $table->timestamps();
        });

        // Create NOTIFICATIONS table
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->timestamp('datetime');
            $table->foreignId('user_id')->nullable()->constrained('users');
            $table->foreignId('admin_id')->nullable()->constrained('admins');
            $table->timestamps();
        });

        // Create NEWS table
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string('image_path');
            $table->foreignId("admin_id")->constrained('admins');
            $table->timestamps();
        });

        // Create SPIN_WHEEL_ENTRIES table
        Schema::create('spin_wheel_entries', function (Blueprint $table) {
            $table->id();
            $table->string('text');
            $table->decimal('prize', 10, 2);
            $table->foreignId('admin_id')->constrained('admins');
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
        Schema::dropIfExists('admins');
        Schema::dropIfExists('classrooms');
        Schema::dropIfExists('order_statuses');
        Schema::dropIfExists('orders');
        Schema::dropIfExists('product_types');
        Schema::dropIfExists('products');
        Schema::dropIfExists('products_in_carts');
        Schema::dropIfExists('products_in_order');
        Schema::dropIfExists('ratings');
        Schema::dropIfExists('notifications');
        Schema::dropIfExists('news');
        Schema::dropIfExists('spin_wheel_entries');
    }
};
