<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create(
            ['name' => 'Minuman dan Kopi'],
            ['id' => \Illuminate\Support\Str::uuid()]
        );
        Category::create(
            ['name' => 'Masakan Padang'],
            ['id' => \Illuminate\Support\Str::uuid()]
        );
    }
}
