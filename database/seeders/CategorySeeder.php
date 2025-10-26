<?php

namespace Database\Seeders;

use App\Models\category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Liste des category possible
        $categories = [
            'iPhone',
            'Samsung',
            'MacBook',
            'iPad',
            'laptopt',
            'Tablette',
            'Apple Watch',
            'AirPods',
            'Accessories',
        ];

        foreach ($categories as $name) {
            category::factory()->create([
                'name' => $name,
            ]);
        }
    }
}
