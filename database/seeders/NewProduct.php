<?php

namespace Database\Seeders;


use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class NewProduct extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [];

        $subCategories = [
            1 => ['Non-coffe', 'noncoffe.jpg', 2],
            2 => ['Coffe', 'coffe.jpg', 2],
            3 => ['Jus', 'jus.jpg', 2],
            4 => ['Snack', 'snack.jpg', 1],
            5 => ['Noodle', 'noodle.jpg', 1],
            6 => ['Rice', 'rice.jpg', 1]
        ];

        $prodId = 19;

        foreach ($subCategories as $subCategoryId => $subCategory) {
            for ($i = 0; $i < 100; $i++) {
                $products[] = [
                    'prodId' => $prodId++, // increment prodId for each product
                    'subCategoryId' => $subCategoryId,
                    'categoryId' => $subCategory[2],
                    'prodName' => $subCategory[0] . ' Product ' . $i,
                    'uom' => 'unit',
                    'price' => rand(10000, 50000), // random price between 10k and 50k
                    'discID' => 'DISC' . str_pad($i + 1, 3, '0', STR_PAD_LEFT),
                    'cost' => rand(5000, 20000), // random cost between 5k and 20k
                    'stock' => rand(50, 200), // random stock
                    'prodImagePath' => $subCategory[1], // subcategory image path
                    'isActive' => 1 // active status
                ];
            }
        }

        // Insert all products into the 'products' table
        DB::table('products')->insert($products);
    }
}
