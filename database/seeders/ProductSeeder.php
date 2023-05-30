<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $categoriesCount = Category::count();
        Product::factory(20)->create();

        $products = Product::get();


        foreach($products as $product) {

            $product->categories()->attach(Category::all()->random(rand(1, $categoriesCount))->pluck('id')->toArray());

        }
    }
}
