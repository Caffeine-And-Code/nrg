<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\ClassModel;
use App\Models\Category;
use App\Models\Product;
use App\Models\Bundle;
use App\Models\Discount;
use App\Models\Command;
use App\Models\Delivery;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            AdminSeeder::class,
        ]);

        // Create Users
        $user = User::create([
            'name' => 'bartender123',
            'email' => 'bartender@example.com',
            'password' => bcrypt('password123')
        ]);

        // Create Classes (e.g., Drink Types)
        $alcoholic = ClassModel::create(['name' => 'Alcoholic']);
        $nonAlcoholic = ClassModel::create(['name' => 'Non-Alcoholic']);

        // Create Categories (e.g., Drink Categories)
        $cocktails = Category::create(['name' => 'Cocktails']);
        $softDrinks = Category::create(['name' => 'Soft Drinks']);
        $beers = Category::create(['name' => 'Beers']);

        // Create Products
        $margarita = Product::create([
            'name' => 'Margarita',
            'description' => 'A classic cocktail with tequila, lime, and triple sec.',
            'price' => 12.50,
            'available_on' => 1,
            'image_path' => 'images/margarita.jpg',
            'category_id' => $cocktails->id
        ]);

        $mojito = Product::create([
            'name' => 'Mojito',
            'description' => 'A refreshing cocktail with rum, mint, and lime.',
            'price' => 10.00,
            'available_on' => 1,
            'image_path' => 'images/mojito.jpg',
            'category_id' => $cocktails->id
        ]);

        $coke = Product::create([
            'name' => 'Coca-Cola',
            'description' => 'Classic soft drink.',
            'price' => 2.50,
            'available_on' => 1,
            'image_path' => 'images/coke.jpg',
            'category_id' => $softDrinks->id
        ]);

        $beer = Product::create([
            'name' => 'Lager Beer',
            'description' => 'A crisp and refreshing lager.',
            'price' => 5.00,
            'available_on' => 1,
            'image_path' => 'images/beer.jpg',
            'category_id' => $beers->id
        ]);

        // Assign Classes to Products
        $alcoholic->products()->attach([$margarita->id, $mojito->id, $beer->id]);
        $nonAlcoholic->products()->attach($coke->id);

        // Create Bundles
        $partyPack = Bundle::create([
            'name' => 'Party Pack',
            'description' => 'Includes Margarita, Mojito, and a Beer.',
            'price' => 25.00,
            'image_path' => 'images/party_pack.jpg'
        ]);

        $partyPack->products()->attach([$margarita->id, $mojito->id, $beer->id]);

        // Create Discounts
        $discount = Discount::create([
            'enabled' => true,
            'reusable' => true,
            'used' => false,
            'valid_since' => now(),
            'percentage_amount' => 10.00,
            'cumulative' => false
        ]);

        // Create Commands
        $command = Command::create([
            'status' => 1,
            'total' => 25.00,
            'user_id' => $user->id,
            'discount_id' => $discount->id
        ]);

        // Create Delivery
        Delivery::create([
            'command_id' => $command->id
        ]);
    }
}