<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Command;
use App\Models\Delivery;
use App\Models\News;
use App\Models\Notification;
use App\Models\Product;
use App\Models\Review;
use App\Models\Seller;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Create a Seller
        $seller = Seller::create([
            'email' => 'barowner@example.com',
            'password' => Hash::make('password123'),
            'fidelity_target' => 100.0,
            'fidelity_price' => 10.0,
        ]);

        // Create a User
        $user = User::create([
            'email' => 'customer@example.com',
            'username' => 'john_doe',
            'number' => '1234567890',
            'password' => Hash::make('password123'),
            'discount_portfolio' => 15,
        ]);

        // Create a Category
        $category = Category::create([
            'name' => 'Drinks',
            'seller_id' => $seller->id,
        ]);

        // Create Products
        $product1 = Product::create([
            'name' => 'Beer',
            'description' => 'A refreshing lager beer.',
            'image_path' => 'images/beer.jpg',
            'price' => 3.5,
            'discount' => 0.5,
            'available' => 50,
            'category_id' => $category->id,
        ]);

        $product2 = Product::create([
            'name' => 'Cocktail',
            'description' => 'A classic mojito.',
            'image_path' => 'images/cocktail.jpg',
            'price' => 7.5,
            'discount' => 1.0,
            'available' => 30,
            'category_id' => $category->id,
        ]);

        // Create a Command
        $command = Command::create([
            'status' => 1, // e.g., 1 for completed
            'total' => 10,
            'discount_amount' => 1.5,
            'user_id' => $user->id,
        ]);

        // Attach products to the command
        $command->products()->attach([$product1->id, $product2->id]);

        // Create a Delivery
        Delivery::create([
            'class_number' => 1,
            'command_id' => $command->id,
        ]);

        // Create Reviews
        Review::create([
            'star' => 5,
            'product_id' => $product1->id,
            'user_id' => $user->id,
        ]);

        Review::create([
            'star' => 4,
            'product_id' => $product2->id,
            'user_id' => $user->id,
        ]);

        // Create Notifications
        Notification::create([
            'send_date' => now(),
            'title' => 'Order Confirmation',
            'description' => 'Your order has been confirmed.',
            'user_id' => $user->id,
            'admin_id' => $seller->id,
        ]);

        Notification::create([
            'send_date' => now(),
            'title' => 'Discount Alert',
            'description' => 'You have earned a discount on your next purchase!',
            'user_id' => $user->id,
            'admin_id' => $seller->id,
        ]);

        // Create News
        News::create([
            'seller_id' => $seller->id,
            'path' => 'news/bar_promotions.pdf',
        ]);
    }
}