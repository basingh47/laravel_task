<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'product_name' => 'Product A',
            'product_description' => 'Description for static product A',
        ]);
        Product::create([
            'product_name' => 'Product B',
            'product_description' => 'Description for static product B',
        ]);
        Product::create([
            'product_name' => 'Product C',
            'product_description' => 'Description for static product C',
        ]);

        // Product::create([
        //     [
        //         [
        //             'product_name' => 'Product A',
        //             'product_description' => 'Description for Product A',
        //             'created_at' => now(),
        //             'updated_at' => now(),
        //         ],
        //         [
        //             'product_name' => 'Product B',
        //             'product_description' => 'Description for Product B',
        //             'created_at' => now(),
        //             'updated_at' => now(),
        //         ],
        //         [
        //             'product_name' => 'Product C',
        //             'product_description' => 'Description for Product C',
        //             'created_at' => now(),
        //             'updated_at' => now(),
        //         ],
        //     ]
        // ]);
    }
}
