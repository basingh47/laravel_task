<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $primaryKey = "product_id";

    protected $fillable = ['product_name','product_description'];

    public function purchaseProducts()
    {
        return $this->hasMany(PurchaseProduct::class,"product_id");
    }

     public function wasteProducts()
    {
        return $this->hasMany(WasteProduct::class, 'product_id');
    }
}
