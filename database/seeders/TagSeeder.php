<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tags')->insert([
            'title' => 'тэг 1'
        ]);
        DB::table('tags')->insert([
            'title' => 'тэг 2'
        ]);
        DB::table('tags')->insert([
            'title' => 'тэг 3'
        ]);
        DB::table('tags')->insert([
            'title' => 'тэг 4'
        ]);
        DB::table('tags')->insert([
            'title' => 'тэг 5'
        ]);
    }
}
