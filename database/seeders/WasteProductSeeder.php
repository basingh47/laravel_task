<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\WasteProduct;

class WasteProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
          WasteProduct::create([
            "throwable_qty"=> 20,
            "product_id"=> 1,
          ]);
    }
}
