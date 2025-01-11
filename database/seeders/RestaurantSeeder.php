<?php

namespace Database\Seeders;

use App\Models\Restaurant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class RestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $category = Category::firstOrCreate(
            ['name' => 'Roti & Kue'], 
            ['id' => \Illuminate\Support\Str::uuid()]
        );

        $category2 = Category::firstOrCreate(
            ['name' => 'Makanan Cepat Saji'],
            ['id' => \Illuminate\Support\Str::uuid()]
        );

        Restaurant::create([
            'name' => 'JCO Central Park Mall',
            'email' => 'jco@corp.id',
            'password' => 'abc',
            'phone' => '0123456789',
            'description' => 'J.CO Donuts & Coffee adalah salah satu merek makanan dan minuman ternama asal Indonesia yang dikenal dengan aneka donat lezat, kopi berkualitas, dan yogurt beku yang menggugah selera. Didirikan pada tahun 2005, J.CO mengusung konsep modern dengan cita rasa yang unik, memadukan bahan-bahan segar dan resep inovatif untuk menciptakan donat lembut dengan berbagai topping menarik.',
            'street' => 'Jl. Letjen S. Parman Kav. 28, RT.12/RW.6, Tanjung Duren Selatan, Central Park Mall',
            'province' => 'Daerah Khusus Ibukota Jakarta',
            'city' => 'Jakarta Barat',
            'subdistrict' => 'Grogol Petamburan',
            'postal_code' => 11470,
            'category_id' => $category->id,
        ]);
        
        Restaurant::create([
            'name' => 'Dunkin Donuts Pantai Indah Kapuk',
            'email' => 'dunkin.pik@corp.id',
            'password' => 'abc',
            'phone' => '08123456789',
            'description' => "Dunkin', sebelumnya dikenal sebagai Dunkin' Donuts, adalah salah satu merek makanan dan minuman terkemuka di dunia yang berasal dari Amerika Serikat. Dikenal sejak 1950, Dunkin' menghadirkan aneka donat lezat, kopi premium, dan minuman berbasis espresso yang menggugah selera. Dengan konsep yang ramah dan modern, Dunkin' memadukan bahan-bahan berkualitas tinggi untuk menciptakan donat empuk dengan berbagai topping kreatif serta minuman yang cocok untuk menemani hari Anda.",
            'street' => 'Jl. Pantai Indah Kapuk No.5, Pantai Indah Kapuk, Penjaringan',
            'province' => 'Daerah Khusus Ibukota Jakarta',
            'city' => 'Jakarta Utara',
            'subdistrict' => 'Penjaringan',
            'postal_code' => 14470,
            'category_id' => $category->id,
        ]);
        
        Restaurant::create([
            'name' => 'BurgerKing',
            'email' => 'burgerking@corp.id',
            'password' => 'abc',
            'phone' => '08512345678',
            'description' => 'Burger King adalah salah satu rantai restoran cepat saji terbesar di dunia yang menawarkan menu andalan berupa burger lezat dengan daging panggang berkualitas. Didirikan pada tahun 1954, restoran ini juga menyediakan menu ayam, kentang goreng, minuman, dan makanan pencuci mulut.',
            'street' => 'Jl. Jend. Sudirman No. 1, RT.3/RW.2, Karet Tengsin, Tanah Abang',
            'province' => 'Daerah Khusus Ibukota Jakarta',
            'city' => 'Jakarta Pusat',
            'subdistrict' => 'Tanah Abang',
            'postal_code' => 10220,
            'category_id' => $category2->id,
        ]);
        
        Restaurant::create([
            'name' => 'KFC',
            'email' => 'kfc@corp.id',
            'password' => 'abc',
            'phone' => '08523456789',
            'description' => '',
            'street' => 'Jl. Margonda Raya No. 358, Pondok Cina, Beji',
            'province' => 'Jawa Barat',
            'city' => 'Depok',
            'subdistrict' => 'Beji',
            'postal_code' => 16424,
            'category_id' => $category2->id,
        ]);
        
        Restaurant::create([
            'name' => 'McDonalds',
            'email' => 'mcdonalds@corp.id',
            'password' => 'abc',
            'phone' => '08534567890',
            'description' => 'McDonald’s adalah salah satu restoran cepat saji terbesar di dunia yang dikenal dengan menu burger, ayam goreng, kentang goreng, dan minuman khasnya.',
            'street' => 'Jl. Thamrin No.10, RT.1/RW.1, Kebon Melati, Menteng',
            'province' => 'Daerah Khusus Ibukota Jakarta',
            'city' => 'Jakarta Pusat',
            'subdistrict' => 'Menteng',
            'postal_code' => 10310,
            'category_id' => $category2->id,
        ]);
        
        Restaurant::create([
            'name' => 'Holland',
            'email' => 'holland@corp.id',
            'password' => 'abc',
            'phone' => '08156789012',
            'description' => 'Holland Bakery adalah toko roti terkemuka di Indonesia yang menyediakan berbagai pilihan roti, kue, dan makanan ringan berkualitas premium.',
            'street' => 'Jl. S. Parman Kav. 98, RT.3/RW.6, Slipi, Palmerah',
            'province' => 'Daerah Khusus Ibukota Jakarta',
            'city' => 'Jakarta Barat',
            'subdistrict' => 'Palmerah',
            'postal_code' => 11410,
            'category_id' => $category->id,
        ]);
        
        Restaurant::create([
            'name' => 'Hokben',
            'email' => 'hokben@corp.id',
            'password' => 'abc',
            'phone' => '08567890123',
            'description' => 'HokBen (Hoka Hoka Bento) adalah restoran cepat saji Jepang yang menghadirkan aneka pilihan menu seperti bento, sushi, dan sup dengan rasa otentik khas Jepang.',
            'street' => 'Jl. M.H. Thamrin No. 9, RT.1/RW.1, Gondangdia, Menteng',
            'province' => 'Daerah Khusus Ibukota Jakarta',
            'city' => 'Jakarta Pusat',
            'subdistrict' => 'Menteng',
            'postal_code' => 10350,
            'category_id' => $category2->id,
        ]);
        
        Restaurant::create([
            'name' => 'Khasanah Bakery Palmerah',
            'email' => 'khasanah@corp.id',
            'password' => 'abc',
            'phone' => '08578901234',
            'description' => 'Khasanah Bakery adalah toko roti lokal yang menghadirkan berbagai macam roti dan kue dengan harga terjangkau dan kualitas terbaik.',
            'street' => 'Jl. Palmerah Utara No. 56, RT.2/RW.3, Palmerah',
            'province' => 'Daerah Khusus Ibukota Jakarta',
            'city' => 'Jakarta Barat',
            'subdistrict' => 'Palmerah',
            'postal_code' => 11480,
            'category_id' => $category->id,
        ]);

    }
}
