<?php

namespace Database\Seeders;

use App\Models\Categorie;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = collect([
            [
                'name' => 'veg',
                'image' => 'https://png.pngtree.com/png-clipart/20241016/original/pngtree-fruit-and-vegetable-png-image_16343587.png'
            ],
            [
                'name' => 'non-veg',
                'image' => 'https://static.vecteezy.com/system/resources/thumbnails/059/535/140/small/tasty-chicken-tandoori-isolated-on-transparent-background-png.png'
            ],
            [
                'name' => 'fastfood',
                'image' => 'https://png.pngtree.com/png-vector/20240807/ourmid/pngtree-pizza-burgers-and-fast-food-meals-png-image_13163209.png'
            ],
            [
                'name' => 'dessert',
                'image' => 'https://png.pngtree.com/png-vector/20240327/ourmid/pngtree-bakery-desserts-pastry-cakes-and-sweets-png-image_12223048.png'
            ],
            [
                'name' => 'drinks',
                'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSlzEQq_jZMZGzOicfHnOIAVblxTrplUq8v3w&s'
            ],
            [
                'name' => 'seafood',
                'image' => 'https://png.pngtree.com/png-vector/20241115/ourmid/pngtree-crab-and-seafood-dish-with-fresh-festive-presentation-png-image_14438903.png'
            ],
        ]);

        $categories->each(function($cat){
            Categorie::create($cat);
        });
    }
}
