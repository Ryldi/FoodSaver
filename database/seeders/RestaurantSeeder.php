<?php

namespace Database\Seeders;

use App\Models\Restaurant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Restaurant::create([
            'name' => 'JCO',
            'email' => 'jco@corp.id',
            'password' => 'abc',
            'phone' => '010101',
            'description' => 'J.CO Donuts & Coffee adalah salah satu merek makanan dan minuman ternama asal Indonesia yang dikenal dengan aneka donat lezat, kopi berkualitas, dan yogurt beku yang menggugah selera. Didirikan pada tahun 2005, J.CO mengusung konsep modern dengan cita rasa yang unik, memadukan bahan-bahan segar dan resep inovatif untuk menciptakan donat lembut dengan berbagai topping menarik. ',
            'address' => 'J.CO Central Park Mall',
            'street' => 'Jl. Letjen S. Parman No.28 #L162 & 163, RT.12/RW.6, Tj. Duren Sel.',
            'province' => 'Daerah Khusus Ibukota Jakarta',
            'city' => 'Jakarta Barat',
            'subdistrict' => 'Grogol petamburan',
            'postal_code' => 11470
        ]);
    }
}
