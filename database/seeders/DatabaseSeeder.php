<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $this->call([
            RestaurantSeeder::class,
            CustomerSeeder::class,
            ProductSeeder::class,
            CartSeeder::class,
            ReviewSeeder::class,
            CouponSeeder::class,
            CustomerCouponSeeder::class,
            TransactionHeaderSeeder::class,
            TransactionDetailSeeder::class
        ]);
    }
}
