<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            'title' => 'Категория 1'
        ]);
        DB::table('categories')->insert([
            'title' => 'Категория 2'
        ]);
        DB::table('categories')->insert([
            'title' => 'Категория 3'
        ]);
    }
}
