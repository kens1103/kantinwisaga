<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    public function run()
    {
        DB::table('products')->insert([
            ['name' => 'Onigiri', 'price' => 3000, 'stock' => 20, 'photo' => 'products/onigiri.jpeg', 'description' => 'Nasi kepal jepang yang dibungkus dengan nori dan diisi dengan berbagai macam isian.', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Jus', 'price' => 5000, 'stock' => 30, 'photo' => 'products/jus.jpeg', 'description' => 'Minuman segar yang terbuat dari berbagai macam buah segar.','created_at' => now(), 'updated_at' => now()],
            ['name' => 'Martabak manis', 'price' => 2000, 'stock' => 35, 'photo' => 'products/martabak_manis.jpeg', 'description' => 'Martabak dengan isian manis seperti coklat, keju, dan kacang.','created_at' => now(), 'updated_at' => now()],
            ['name' => 'Brownies', 'price' => 2500, 'stock' => 15, 'photo' => 'products/brownies.jpeg', 'description' => 'Kue coklat yang lembut dan manis, cocok untuk cemilan.','created_at' => now(), 'updated_at' => now()],
            ['name' => 'Kroket', 'price' => 1000, 'stock' => 25, 'photo' => 'products/kroket.jpeg', 'description' => 'Gorengan dengan isian kentang dan daging yang digoreng hingga renyah.','created_at' => now(), 'updated_at' => now()],
            ['name' => 'Kue sus', 'price' => 2000, 'stock' => 25, 'photo' => 'products/kue_sus.jpeg', 'description' => 'Kue berbentuk bundar dengan isian vla yang lembut dan manis.','created_at' => now(), 'updated_at' => now()],
            ['name' => 'Risoles', 'price' => 3000, 'stock' => 40, 'photo' => 'products/risoles.jpeg', 'description' => 'Gorengan berisi sayuran dan daging yang dibungkus dengan kulit tipis dan digoreng.','created_at' => now(), 'updated_at' => now()],
            ['name' => 'Salad agar', 'price' => 10000, 'stock' => 15, 'photo' => 'products/salad_agar.jpeg', 'description' => 'Salad segar dengan potongan agar-agar.','created_at' => now(), 'updated_at' => now()],
            ['name' => 'Semangka', 'price' => 1000, 'stock' => 40, 'photo' => 'products/semangka.jpeg', 'description' => 'Buah semangka segar yang cocok untuk menghilangkan dahaga.','created_at' => now(), 'updated_at' => now()],
            ['name' => 'Sosis', 'price' => 3000, 'stock' => 25, 'photo' => 'products/sosis.jpeg', 'description' => 'Sosis yang dapat dinikmati sebagai cemilan atau pelengkap makanan.','created_at' => now(), 'updated_at' => now()],
            ['name' => 'Ayam', 'price' => 7000, 'stock' => 30, 'photo' => 'products/ayam.jpg', 'description' => 'Ayam bumbu yang disajikan dengan bumbu rempah yang khas dan menggugah selera.','created_at' => now(), 'updated_at' => now()],
            ['name' => 'Bakpao', 'price' => 2500, 'stock' => 15, 'photo' => 'products/bakpao.jpeg', 'description' => 'Bakpao empuk dengan isian coklat yang manis, diproses dengan teknik pengukusan tradisional untuk menghasilkan tekstur yang lembut.','created_at' => now(), 'updated_at' => now()],
            ['name' => 'Bala bala', 'price' => 1000, 'stock' => 45, 'photo' => 'products/bala2.jpg', 'description' => 'Gorengan renyah yang terbuat dari campuran sayuran segar dan tepung, cocok dinikmati sebagai camilan atau lauk.','created_at' => now(), 'updated_at' => now()],
            // Tambahkan data produk lainnya sesuai kebutuhan
        ]);
    }
}
