<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    public function run()
    {
        DB::table('products')->insert([
            ['name' => 'Onigiri', 'price' => 3000, 'stock' => 20, 'photo' => 'products/onigiri.jpeg', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Jus', 'price' => 5000, 'stock' => 30, 'photo' => 'products/jus.jpeg', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Martabak manis', 'price' => 2000, 'stock' => 35, 'photo' => 'products/martabak_manis.jpeg', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Brownies', 'price' => 2500, 'stock' => 15, 'photo' => 'products/brownies.jpeg', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Kroket', 'price' => 1000, 'stock' => 25, 'photo' => 'products/kroket.jpeg', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Kue sus', 'price' => 2000, 'stock' => 25, 'photo' => 'products/kue_sus.jpeg', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Risoles', 'price' => 3000, 'stock' => 40, 'photo' => 'products/risoles.jpeg', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Salad agar', 'price' => 10000, 'stock' => 15, 'photo' => 'products/salad_agar.jpeg', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Semangka', 'price' => 1000, 'stock' => 40, 'photo' => 'products/semangka.jpeg', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Sosis', 'price' => 3000, 'stock' => 25, 'photo' => 'products/sosis.jpeg', 'created_at' => now(), 'updated_at' => now()],
            // Tambahkan data produk lainnya sesuai kebutuhan
        ]);
    }
}
