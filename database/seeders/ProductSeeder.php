<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = category::all();

        // S'assure de la pressence des category et les recupere
        if ($categories->isEmpty()) {
            $this->call(CategorySeeder::class);
            $categories = category::all();
        }

        // Creation de 50 produit en utilisant Product et categories
        Product::factory(50)->make()->each(function ($product) use ($categories) {
            // Assigne une random category au produit
            $product->category_id = $categories->random()->id;
            $product->save();
        });
    }
}
