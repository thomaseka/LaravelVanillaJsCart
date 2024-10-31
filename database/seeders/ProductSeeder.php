<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            [
                'prodId' => 1,
                'subCategoryId' => 1,
                'categoryId' => 2,
                'prodName' => 'Iced Tea',
                'uom' => 'cup',
                'price' => 10000,
                'discID' => 'DISC001',
                'cost' => 5000,
                'stock' => 100,
                'prodImagePath' => 'es-teh.jpg',
                'isActive' => 1
            ],
            [
                'prodId' => 2,
                'subCategoryId' => 1,
                'categoryId' => 2,
                'prodName' => 'Lemonade',
                'uom' => 'cup',
                'price' => 12000,
                'discID' => 'DISC002',
                'cost' => 6000,
                'stock' => 15,
                'prodImagePath' => 'lemonade.jpg',
                'isActive' => 1
            ],
            [
                'prodId' => 3,
                'subCategoryId' => 2,
                'categoryId' => 2,
                'prodName' => 'Americano',
                'uom' => 'cup',
                'price' => 15000,
                'discID' => 'DISC003',
                'cost' => 8000,
                'stock' => 100,
                'prodImagePath' => 'kopi3.jpg',
                'isActive' => 1
            ],
            [
                'prodId' => 4,
                'subCategoryId' => 2,
                'categoryId' => 2,
                'prodName' => 'Latte',
                'uom' => 'cup',
                'price' => 18000,
                'discID' => 'DISC004',
                'cost' => 9000,
                'stock' => 100,
                'prodImagePath' => 'kopi1.jpg',
                'isActive' => 1
            ],
            [
                'prodId' => 5,
                'subCategoryId' => 3,
                'categoryId' => 2,
                'prodName' => 'Orange Juice',
                'uom' => 'cup',
                'price' => 13000,
                'discID' => 'DISC005',
                'cost' => 7000,
                'stock' => 100,
                'prodImagePath' => 'orange-juice.jpg',
                'isActive' => 1
            ],
            [
                'prodId' => 6,
                'subCategoryId' => 3,
                'categoryId' => 2,
                'prodName' => 'Apple Juice',
                'uom' => 'cup',
                'price' => 14000,
                'discID' => 'DISC006',
                'cost' => 7500,
                'stock' => 100,
                'prodImagePath' => 'apple-juice.jpg',
                'isActive' => 1
            ],
            [
                'prodId' => 7,
                'subCategoryId' => 4,
                'categoryId' => 1,
                'prodName' => 'French Fries',
                'uom' => 'plate',
                'price' => 25000,
                'discID' => 'DISC007',
                'cost' => 10000,
                'stock' => 100,
                'prodImagePath' => 'french-fries.jpg',
                'isActive' => 1
            ],
            [
                'prodId' => 8,
                'subCategoryId' => 4,
                'categoryId' => 1,
                'prodName' => 'Happy Box',
                'uom' => 'plate',
                'price' => 22000,
                'discID' => 'DISC008',
                'cost' => 9500,
                'stock' => 5,
                'prodImagePath' => 'snack.jpg',
                'isActive' => 1
            ],
            [
                'prodId' => 9,
                'subCategoryId' => 5,
                'categoryId' => 1,
                'prodName' => 'Noodle Soup',
                'uom' => 'bowl',
                'price' => 30000,
                'discID' => 'DISC009',
                'cost' => 15000,
                'stock' => 100,
                'prodImagePath' => 'miekuah.jpg',
                'isActive' => 1
            ],
            [
                'prodId' => 10,
                'subCategoryId' => 5,
                'categoryId' => 1,
                'prodName' => 'Tek Tek Noodle',
                'uom' => 'bowl',
                'price' => 28000,
                'discID' => 'DISC010',
                'cost' => 14000,
                'stock' => 100,
                'prodImagePath' => 'mitektek.jpg',
                'isActive' => 1
            ],
            [
                'prodId' => 11,
                'subCategoryId' => 6,
                'categoryId' => 1,
                'prodName' => 'Fried Rice',
                'uom' => 'plate',
                'price' => 35000,
                'discID' => 'DISC011',
                'cost' => 20000,
                'stock' => 100,
                'prodImagePath' => 'rice.jpg',
                'isActive' => 1
            ],
            [
                'prodId' => 12,
                'subCategoryId' => 6,
                'categoryId' => 1,
                'prodName' => 'Chicken Briyani',
                'uom' => 'plate',
                'price' => 10000,
                'discID' => 'DISC012',
                'cost' => 5000,
                'stock' => 100,
                'prodImagePath' => 'chicken-briyani.jpg',
                'isActive' => 1
            ],
            [
                'prodId' => 13,
                'subCategoryId' => 3,
                'categoryId' => 2,
                'prodName' => 'Random Juice',
                'uom' => 'cup',
                'price' => 14000,
                'discID' => 'DISC013',
                'cost' => 7500,
                'stock' => 100,
                'prodImagePath' => 'jus.jpg',
                'isActive' => 1
            ],
            [
                'prodId' => 14,
                'subCategoryId' => 4,
                'categoryId' => 1,
                'prodName' => 'Mango Smoothie',
                'uom' => 'glass',
                'price' => 16000,
                'discID' => 'DISC014',
                'cost' => 8000,
                'stock' => 50,
                'prodImagePath' => 'mango_smoothie.jpg',
                'isActive' => 0
            ],
            [
                'prodId' => 15,
                'subCategoryId' => 3,
                'categoryId' => 2,
                'prodName' => 'Tomato Juice',
                'uom' => 'cup',
                'price' => 12000,
                'discID' => 'DISC015',
                'cost' => 7000,
                'stock' => 75,
                'prodImagePath' => 'tomato_juice.jpg',
                'isActive' => 0
            ],
            [
                'prodId' => 16,
                'subCategoryId' => 4,
                'categoryId' => 1,
                'prodName' => 'Grape Smoothie',
                'uom' => 'bottle',
                'price' => 18000,
                'discID' => 'DISC016',
                'cost' => 9000,
                'stock' => 30,
                'prodImagePath' => 'grape_smoothie.jpg',
                'isActive' => 0
            ],
            [
                'prodId' => 17,
                'subCategoryId' => 3,
                'categoryId' => 2,
                'prodName' => 'Watermelon Juice',
                'uom' => 'cup',
                'price' => 15000,
                'discID' => 'DISC017',
                'cost' => 7500,
                'stock' => 80,
                'prodImagePath' => 'watermelon_juice.jpg',
                'isActive' => 0
            ],
            [
                'prodId' => 18,
                'subCategoryId' => 4,
                'categoryId' => 1,
                'prodName' => 'Pineapple Smoothie',
                'uom' => 'glass',
                'price' => 17000,
                'discID' => 'DISC018',
                'cost' => 8500,
                'stock' => 60,
                'prodImagePath' => 'pineapple_smoothie.jpg',
                'isActive' => 0
            ]
        ]);
    }
}
