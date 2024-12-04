<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                "name" => "Bibit Buah",
                "description" => "Deskripsi Bibit Buah",
                "image" => "images/category/1733299379_bibit_buah.jpg",
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                "name" => "Bibit Pohon Hias",
                "description" => "Deskripsi Bibit Pohon Hias",
                "image" => "images/category/1733299430_bibit_pohon_hias.jpeg",
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                "name" => "Bibit Tanaman Hias",
                "description" => "Deskripsi Bibit Tanaman Hias",
                "image" => "images/category/1733299447_bibit_tanaman_hias.jpg",
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                "name" => "Bibit rempah-rempah",
                "description" => "Deskripsi Bibit rempah-rempah",
                "image" => "images/category/1733299465_bibit_rempah.jpeg",
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                "name" => "Bibit Obat herbal",
                "description" => "Deskripsi Bibit Obat herbal",
                "image" => "images/category/1733299487_bibit_tanaman_herbal.jpeg",
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];
        Category::insert($categories);
    }
}
