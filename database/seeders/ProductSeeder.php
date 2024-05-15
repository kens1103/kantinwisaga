<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    public function run()
    {
        DB::table('products')->insert([
            ['name' => 'onigiri', 'description' => 'enak loh...', 'price' => 3000, 'stock' => 10, 'photo' => 'products/onigiri.jpeg', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'jus', 'description' => 'enak nih ...', 'price' => 5000, 'stock' => 31, 'photo' => 'products/jus.jpeg', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'martabak manis', 'description' => 'enak banget...', 'price' => 3000, 'stock' => 45, 'photo' => 'products/martabak_manis.jpeg', 'created_at' => now(), 'updated_at' => now()],
            // Tambahkan data produk lainnya sesuai kebutuhan
        ]);
    }
}
