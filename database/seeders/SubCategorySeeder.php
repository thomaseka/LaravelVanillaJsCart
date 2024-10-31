<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('subcategory')->insert([
            [
                'subCategoryId' => '1',
                'subCategoryName' => 'Non-coffe',
                'subCategoryImagePath' => 'noncoffe.jpg',
                'categoryId' => 2,
            ],
            [
                'subCategoryId' => '2',
                'subCategoryName' => 'Coffe',
                'subCategoryImagePath' => 'coffe.jpg',
                'categoryId' => 2,
            ],
            [
                'subCategoryId' => '3',
                'subCategoryName' => 'Jus',
                'subCategoryImagePath' => 'jus.jpg',
                'categoryId' => 2,
            ],
            [
                'subCategoryId' => '4',
                'subCategoryName' => 'Snack',
                'subCategoryImagePath' => 'snack.jpg',
                'categoryId' => 1,
            ],
            [
                'subCategoryId' => '5',
                'subCategoryName' => 'Noodle',
                'subCategoryImagePath' => 'noodle.jpg',
                'categoryId' => 1,
            ],
            [
                'subCategoryId' => '6',
                'subCategoryName' => 'Rice',
                'subCategoryImagePath' => 'rice.jpg',
                'categoryId' => 1,
            ],
            // Add more users as needed
        ]);
    }
}
