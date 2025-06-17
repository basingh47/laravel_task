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
    for ($i = 0; $i < 10; $i++) {
      WasteProduct::create([
        "throwable_qty" => random_int(1,10),
        "product_id" => random_int(1,3),
      ]);
    }
  }
}
