<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('category')->insert([
            [
                'categoryId' => 1,
                'categoryName' => 'Food',
            ],
            [
                'categoryId' => 2,
                'categoryName' => 'Drink',
            ],
        ]);
    }
}
