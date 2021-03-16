<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $categories = Category::all();

        foreach ($categories as $category) {
            /** @var Category $category */
            $category->products()->saveMany(Product::factory()->count(5)->make());
        }
    }
}
