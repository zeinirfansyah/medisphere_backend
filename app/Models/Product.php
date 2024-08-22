<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['product_name', 'product_description', 'original_price', 'product_price', 'product_stock', 'product_image'];

    public function category()
    {
        return $this->belongsTo(ProductCategory::class, 'product_category_id');
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class, 'unit_id');
    }

    public function discount()
    {
        return $this->belongsTo(Discount::class, 'discount_id');
    }

    public function purchase_detail()
    {
        return $this->hasMany(PurchaseDetail::class, 'product_id');
    }

    public function order_detail()
    {
        return $this->hasMany(OrderDetail::class, 'product_id');
    }
}
