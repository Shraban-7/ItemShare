<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Review;
use App\Models\Product;
use App\Models\Category;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::create([
        //     'name' => 'Super Admin',
        //     'email' => 'superadmin@example.com',
        //     'phone'=> '+97400000000',
        //     'password'=>Hash::make('password'),
        //     'role'=>'admin',
        //     'status'=>1
        // ]);

        // $categories = [
        //     "Electronics",
        //     "Sports & Outdoor",
        //     "Home & Garden",
        //     "Fashion",
        //     "Entertainment",
        //     "Travel",
        //     "Children & Babies",
        //     "Books & Media",
        //     "Special Occasions"
        // ];

        // foreach ($categories as $categoryName) {
        //     Category::create(['name' => $categoryName]);
        // }

        // $categories = Category::all();

        // foreach ($categories as $category) {
        //     for ($i = 1; $i <= 20; $i++) {
        //         Product::create([
        //             'name' => $category->name . ' Product ' . $i,
        //             'image' => 'https://via.placeholder.com/150', // Placeholder image URL
        //             'description' => 'This is a sample description for ' . $category->name . ' Product ' . $i,
        //             'status' => true,
        //             'is_available' => true,
        //             'rental_duration' => rand(1, 30), // Random rental duration between 1 and 30 days
        //             'rental_fee' => rand(10, 100), // Random rental fee between 10 and 100
        //             'user_id' => rand(1, 10), // Random user ID between 1 and 10
        //             'category_id' => $category->id,
        //         ]);
        //     }
        // }

        $users = [2, 13, 14]; // User IDs to use
        $products = [181, 182, 183]; // Product IDs to use
        $bookings = [1, 2, 3, 5, 6]; // Booking IDs to use
        $reviewsPerUser = 5; // Number of reviews per user

        foreach ($users as $userId) {
            foreach ($products as $productId) {
                foreach ($bookings as $bookingId) {
                    for ($i = 0; $i < $reviewsPerUser; $i++) {
                        Review::create([
                            'user_id' => $userId,
                            'product_id' => $productId,
                            'booking_id' => $bookingId,
                            'comment' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
                            'rating' => rand(1, 5),
                        ]);
                    }
                }
            }
        }
    }
}
