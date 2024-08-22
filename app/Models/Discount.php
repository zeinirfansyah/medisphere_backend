<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    use HasFactory;

    protected $fillable = ['discount_name', 'discount_description', 'discount_rate', 'discount_start_date', 'discount_end_date', 'discount_status', 'product_id', 'uid'];


    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
