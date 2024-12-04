<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            [
                "name" => "Bibit Jeruk",
                "description" => "Deskripsi Bibit Jeruk",
                "price" => 35000,
                "stock" => 34,
                "image" => "images/product/1733300892_bibit_jeruk.jpg",
                "category_id" => 1,
            ],
            [
                "name" => "Bibit Mangga",
                "description" => "Deskripsi Bibit Mangga",
                "price" => 67000,
                "stock" => 21,
                "image" => "images/product/1733301678_bibit_mangga.jpg",
                "category_id" => 1,
            ],
            [
                "name" => "Bibit Alpukat",
                "description" => "Deskripsi Bibit Alpukat",
                "price" => 85000,
                "stock" => 34,
                "image" => "images/product/1733302076_bibit_alpukat.jpg",
                "category_id" => 1,
            ],
            [
                "name" => "Bibit Pepaya",
                "description" => "Deskripsi Bibit Pepaya",
                "price" => 35000,
                "stock" => 12,
                "image" => "images/product/1733302316_bibit_pepaya.jpeg",
                "category_id" => 1,
            ],
            [
                "name" => "Bibit Rambutan",
                "description" => "Deskripsi Bibit Rambutan",
                "price" => 124000,
                "stock" => 34,
                "image" => "images/product/1733300592_bibit_rambutan.jpg",
                "category_id" => 1,
            ]
        ];
        Product::insert($products);
    }
}
