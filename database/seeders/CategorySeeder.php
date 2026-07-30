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
        Category::create([
            'name'=>'Cucina',
            'slug'=>'cucina',
        ]);

        Category::create([
            'name'=>'Fashion',
            'slug'=>'fashion',
        ]);

        Category::create([
            'name'=>'Giardinaggio',
            'slug'=>'giardinaggio',
        ]);
    }
}
