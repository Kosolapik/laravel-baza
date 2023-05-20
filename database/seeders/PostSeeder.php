<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i <= 305; $i++) {
            DB::table('posts')->insert([
                'title' => 'Объявление ' . $i,
                'content' => 'Содержание объявления ' . $i,
                'image' => $i + 1 . '.img',
                'likes' => random_int(0, 2000),
                'is_published' => random_int(0, 1),
                'category_id' => random_int(1, 3)
            ]);
        }
    }
}
