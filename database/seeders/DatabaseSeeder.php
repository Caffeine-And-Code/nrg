<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Seed Users
        $userId = DB::table('users')->insertGetId([
            'email' => 'john.doe@example.com',
            'username' => 'JohnDoe',
            'password' => Hash::make('password123'),
            'last_access' => now(),
            'total_spent' => 150.75,
            'discount_portfolio' => 10.50,
            'last_meter' => 10,
            'remember_token' => str()->random(10),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('users')->insertGetId([
            'email' => 'rossino.pierino@example.com',
            'username' => 'manuelito',
            'password' => Hash::make('password123'),
            'last_access' => now(),
            'total_spent' => 150.75,
            'discount_portfolio' => 10.50,
            'last_meter' => 10,
            'remember_token' => str()->random(10),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Seed Admins
        $adminId = DB::table('admins')->insertGetId([
            'email' => 'admin@example.com',
            'username' => 'AdminBoss',
            'password' => Hash::make('adminpassword'),
            'fm_prize' => 500.00,
            'fm_target' => 1000.00,
            'delivery_cost' => 5.00,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Seed Classrooms
        $classroomId = DB::table('classrooms')->insertGetId([
            'name' => 'Private Lounge',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Seed Order Statuses
        $orderStatusId = DB::table('order_statuses')->insertGetId([
            'name' => 'Pending',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Seed Orders
        $orderId = DB::table('orders')->insertGetId([
            'number' => 1001,
            'delivery_time' => now()->addHours(2),
            'used_portfolio' => 5.00,
            'delivery_cost' => 2.50,
            'user_id' => $userId,
            'order_status_id' => $orderStatusId,
            'classroom_id' => $classroomId,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Seed Product Types
        $productTypeId = DB::table('product_types')->insertGetId([
            'name' => 'Beverages',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Seed Products
        $productId = DB::table('products')->insertGetId([
            'image' => 'beer.png',
            'name' => 'Craft Beer',
            'description' => 'A refreshing locally brewed craft beer.',
            'price' => 7.50,
            'perc_discount' => 10.00,
            'product_type_id' => $productTypeId,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Seed Products in Cart
        DB::table('products_in_carts')->insert([
            'user_id' => $userId,
            'product_id' => $productId,
            'quantity' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Seed Products in Order
        DB::table('products_in_order')->insert([
            'order_id' => $orderId,
            'product_id' => $productId,
            'bought_price' => 7.50,
            'bought_perc_discount' => 10.00,
            'quantity' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Seed Ratings
        DB::table('ratings')->insert([
            'user_id' => $userId,
            'product_id' => $productId,
            'rating' => 5,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Seed Notifications
        DB::table('notifications')->insert([
            'title' => 'Order Update',
            'description' => 'Your order #1001 is being prepared.',
            'datetime' => now(),
            'user_id' => $userId,
            'admin_id' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Seed News
        DB::table('news')->insert([
            'image_path' => 'promo.jpg',
            'admin_id' => $adminId,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Seed Spin Wheel Entries
        DB::table('spin_wheel_entries')->insert([
            'text' => 'Free Beer',
            'prize' => 7.50,
            'admin_id' => $adminId,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
