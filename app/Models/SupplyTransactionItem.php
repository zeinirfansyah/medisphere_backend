<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupplyTransactionItem extends Model
{
    use HasFactory;


    protected $fillable = ['uid', 'quantity', 'price', 'supply_transaction_id', 'product_id'];

    protected $casts = [
        'uid' => 'string',
    ];

    public function supplyTransaction()
    {
        return $this->belongsTo(SupplyTransaction::class, 'supply_transaction_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
