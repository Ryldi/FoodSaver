<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Customer::create([
            'email' => 'bernardbereness78@gmail.com',
            'password' => 'abc',
            'name' => 'Bernard',
            'phone' => '081369251040'
        ]);

         Customer::create([
            'email' => 'ivanadrian0864"gmail.com',
            'password' => 'abc',
            'name' => 'Ivan',
            'phone' => '08979780001'
        ]);
    }
}
