<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class WasteProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        for ($i = 0; $i < 20; $i++) {
            DB::table('waste_products')->insert([
                'throwable_qty' => rand(1, 5),
                'product_id' => rand(1, 8),
                'created_at'=>now(),
                'updated_at'=>now(),
            ]);
        }
    }
}
