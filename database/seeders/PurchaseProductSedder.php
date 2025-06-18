<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PurchaseProduct;

class PurchaseProductSedder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PurchaseProduct::create([
            "product_id"=>1,
            "qty"=> 50,
            "date"=> now()->format("Y-m-d")
        ]);
    }
}
