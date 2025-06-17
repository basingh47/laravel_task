<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PurchaseProduct;
use Carbon\Carbon;

class PurchaseProductSedder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 10; $i++) {
            $start = Carbon::now()->subDays(13);
            $end = Carbon::now();
            $randomDate = Carbon::createFromTimestamp(rand($start->timestamp, $end->timestamp))->format('Y-m-d');

            PurchaseProduct::create([
                "product_id" => random_int(1, 3),
                "qty" => random_int(10, 50),
                "date" => $randomDate
            ]);
        }
    }
}
