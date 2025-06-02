<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\User;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $users = User::all();

        // pastikan ada user dulu
        if ($users->count() === 0) {
            $this->command->info('No users found, skipping product seeding.');
            return;
        }

        $products = [
            ['Laptop Bekas Acer', 'Laptop masih normal, baterai awet.', 2500000, 2, 'bekas', null],
            ['Smartphone Samsung A12', 'Layar masih mulus, tidak ada lecet.', 1800000, 5, 'bekas', null],
            ['Kamera Canon EOS', 'Kamera DSLR dengan lensa kit.', 3500000, 1, 'bekas', null],
            ['Mouse Logitech M185', 'Wireless mouse kondisi baru.', 150000, 10, 'baru', null],
            ['Keyboard Mechanical', 'Switch Blue, full RGB.', 500000, 3, 'baru', null],
            ['Monitor LG 24 Inch', 'Full HD 1080p, cocok untuk desain.', 1300000, 2, 'bekas', null],
            ['Headset Gaming Rexus', 'Suara jernih dan mic aktif.', 250000, 4, 'baru', null],
            ['Tablet iPad Mini', 'Masih berfungsi dengan baik.', 2200000, 1, 'bekas', null],
            ['Printer Epson L3110', 'Cetak masih normal, tinta baru diisi.', 1600000, 1, 'bekas', null],
            ['Harddisk Eksternal 1TB', 'Cocok untuk backup data.', 700000, 7, 'baru', null],
        ];

        foreach ($products as $index => $data) {
            Product::create([
                'user_id' => $users[$index % $users->count()]->id, // dibagi rata ke user yang ada
                'nama_product' => $data[0],
                'deskripsi' => $data[1],
                'harga' => $data[2],
                'stok' => $data[3],
                'kondisi' => $data[4],
                'image_url' => $data[5],
            ]);
        }
    }
}
