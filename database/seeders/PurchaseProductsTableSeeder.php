<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Faker\Factory as Faker;

class PurchaseProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        
        // $start = Carbon::now()->subDays(18);
        // $end = Carbon::now();
        // $randomDate = Carbon::createFromTimestamp(rand($start->timestamp, $end->timestamp))->format('Y-m-d');
        for ($i = 0; $i < 20; $i++) {
            DB::table('purchase_products')->insert([
                'product_id'=>rand(1, 8),
                'qty'=>rand(1, 5),
                'date'=>$faker->dateTimeBetween('2025-06-01', '2025-06-30'),
                'created_at'=>now(),
                'updated_at'=>now(),
            ]);
        }
    }
}
