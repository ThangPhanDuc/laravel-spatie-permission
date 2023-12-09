<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create(['name' => 'Phones', 'code' => 'PHN', 'description' => 'Smartphones and mobile devices']);
        Category::create(['name' => 'Laptops', 'code' => 'LAP', 'description' => 'Laptops and notebooks']);
        Category::create(['name' => 'Tablets', 'code' => 'TAB', 'description' => 'Tablet computers']);
    }
}
