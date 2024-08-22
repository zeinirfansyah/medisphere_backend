<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = ['payment_date', 'payment_amount', 'payment_method', 'order_id', 'uid'];

    protected $casts = [
        'uid' => 'string',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }
    
}
