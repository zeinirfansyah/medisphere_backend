<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupplyTransaction extends Model
{
    use HasFactory;


    protected $fillable = ['uid', 'transaction_date', 'tax', 'total_amount', 'supplier_id', 'user_id'];


    protected $casts = [
        'uid' => 'string',
    ];


    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id');
    }


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function supplyTransactionItem()
    {
        return $this->hasMany(SupplyTransactionItem::class);
    }
}
