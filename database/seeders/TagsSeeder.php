<?php

namespace Database\Seeders;

use App\Models\Tags;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Tags::create([
             'name' => 'Facile',
             'slug' => 'facile',
        ]);
        Tags::create([
             'name' => 'Estate',
             'slug' => 'estate',
        ]);
        Tags::create([
             'name' => 'Tutorial',
             'slug' => 'tutorial',
        ]);
        Tags::create([
             'name' => 'Consigli',
             'slug' => 'consigli',
        ]);
    }
}
