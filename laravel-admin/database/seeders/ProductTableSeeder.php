<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Product::truncate();

        Product::create([
            'name' => 'Smartphone X',
            'code' => 'SPX001',
            'unit_price' => 799.99,
            'discount' => 10.00,
            'final_price' => 719.99,
            'category_id' => 1,
            'image' => 'https://cdn.tgdd.vn/Products/Images/42/305658/iphone-15-pro-max-blue-thumbnew-600x600.jpg',
            'description' => 'A high-end smartphone with advanced features.',
        ]);

        Product::create([
            'name' => 'Laptop Pro',
            'code' => 'LTP002',
            'unit_price' => 1499.99,
            'discount' => 0.00,
            'final_price' => 1499.99,
            'category_id' => 2,
            'image' => 'https://cdn.tgdd.vn/Products/Images/44/304867/asus-tuf-gaming-f15-fx506hf-i5-hn014w-thumb-600x600.jpg',
            'description' => 'Powerful laptop for professional use.',
        ]);

        Product::create([
            'name' => 'Tablet A',
            'code' => 'TAB003',
            'unit_price' => 349.99,
            'discount' => 20.00,
            'final_price' => 279.99,
            'category_id' => 3,
            'image' => 'https://cdn.tgdd.vn/Products/Images/522/318353/honor-pad-x9-thumb-1-600x600.jpg',
            'description' => 'Compact tablet with a sleek design.',
        ]);
    }
}
