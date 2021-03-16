<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Symfony\Component\VarDumper\Cloner\VarCloner;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $categories = [
            'Men',
            'Woman',
            'Children',
            'Accessors'
        ];

        foreach ($categories as $key => $category) {
            Category::factory()->create(['slug' => $category]);
        }
    }
}
