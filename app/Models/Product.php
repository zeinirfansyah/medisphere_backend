<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['product_name', 'product_code', 'original_price', 'adjusted_price', 'stock', 'product_description', 'product_image', 'uid', 'product_category_id', 'unit_id'];

    protected $casts = [
        'uid' => 'string',
    ];

    public function productCategory()
    {
        return $this->belongsTo(ProductCategory::class, 'product_category_id');
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class, 'unit_id');
    }


    public function discount()
    {
        return $this->belongsTo(Discount::class. 'product_id');
    }
}
