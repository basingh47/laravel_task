<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PurchaseProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 20; $i++) {
            DB::table('purchase_products')->insert([
                'product_id' => rand(1, 6),
                'qty'=>rand(1, 100),
                'date'=>Carbon::now()->subDays(rand(0, 365))->toDateString(),
                'created_at'=>now(),
                'updated_at'=>now(),
            ]);
        }
    }
}
