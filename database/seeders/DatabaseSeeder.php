<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Classroom;
use App\Models\News;
use App\Models\Order;
use App\Models\Product;
use App\Models\ProductType;
use App\Models\SpinWheelEntry;
use App\Models\User;
use App\Notifications\OrderCreatedUserNofication;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Create Admin
        $admin = Admin::create([
            'email' => 'admin@example.com',
            'username' => 'admin',
            'password' => Hash::make('password'),
            'fm_prize' => 100.50,
            'fm_target' => 500.00,
            'delivery_cost' => 10.00,
        ]);

        

        // Create Product Types
        $productType1 = ProductType::query()->create(['name' => 'Electronics']);
        $productType2 = ProductType::query()->create(['name' => 'Books']);

        // Create Products
        $products = [
            Product::query()->create([
                'image' => 'product1.jpg',
                'name' => 'Smartphone',
                'description' => 'Latest model smartphone with high performance.',
                'price' => 699.99,
                'perc_discount' => 10,
                'product_type_id' => $productType1->id,
                'isVisible' => true,
            ]),
            Product::query()->create([
                'image' => 'product2.jpg',
                'name' => 'Laptop',
                'description' => 'Lightweight and powerful laptop.',
                'price' => 999.99,
                'perc_discount' => 15,
                'product_type_id' => $productType1->id,
                'isVisible' => true,
            ]),
            Product::query()->create([
                'image' => 'product3.jpg',
                'name' => 'Programming Book',
                'description' => 'Learn Laravel with this comprehensive guide.',
                'price' => 49.99,
                'perc_discount' => 5,
                'product_type_id' => $productType2->id,
                'isVisible' => true,
            ]),

            
        ];

        // Create Classrooms
        $classroom1 = Classroom::query()->create(['name' => 'Classroom A']);
        $classroom2 = Classroom::query()->create(['name' => 'Classroom B']);

        // Create Users
        $users = [
            User::query()->create([
                'email' => 'user1@example.com',
                'username' => 'user1',
                'password' => Hash::make('password'),
                'last_access' => Carbon::now(),
                'total_spent' => 150.50,
                'discount_portfolio' => 10.00,
                'last_meter' => 5,
            ]),
            User::query()->create([
                'email' => 'user2@example.com',
                'username' => 'user2',
                'password' => Hash::make('password'),
                'last_access' => Carbon::now(),
                'total_spent' => 200.00,
                'discount_portfolio' => 20.00,
                'last_meter' => 3,
            ]),
        ];

        //create a rating for the product
        DB::table('ratings')->insert([
            'user_id' => $users[0]->id,
            'product_id' => $products[0]->id,
            'rating' => 5,
        ]);

        // Create Orders
        foreach ($users as $user) {
            $order = Order::query()->create([
                'number' => rand(1000, 9999),
                'delivery_time' => Carbon::now()->addDays(rand(1, 5)),
                'used_portfolio' => rand(5, 20),
                'delivery_cost' => 10.00,
                'user_id' => $user->id,
                'status' => Order::STATUS_CREATED,
                'classroom_id' => $classroom1->id,
                'total' => rand(100, 300),
            ]);

            $order->products()->attach($products[0], ['bought_price'=>$products[0]->price, 'bought_perc_discount'=>0, 'quantity'=>3]);

            $admin->notify(new OrderCreatedUserNofication($order,false));
        }


        // Create News
        News::query()->create([
            'image_path' => 'news1.jpg',
            'admin_id' => $admin->id,
        ]);
        News::query()->create([
            'image_path' => 'news2.jpg',
            'admin_id' => $admin->id,
        ]);

        // Create Spin Wheel Entries
        SpinWheelEntry::query()->create([
            'text' => 'Win a 10% discount!',
            'prize' => 10.00,
            'admin_id' => $admin->id,
        ]);
        SpinWheelEntry::query()->create([
            'text' => 'Free Shipping!',
            'prize' => 0.00,
            'admin_id' => $admin->id,
        ]);
    }
}
