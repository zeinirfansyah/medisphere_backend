<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;


    protected $fillable = [
        'payment_date',
        'amount',
        'payment_method',
        'transaction_tax',
        'payment_status_id',
        'order_id',
        'uid'
    ];


    protected $casts = [
        'uid' => 'string',
    ];


    public function paymentStatus()
    {
        return $this->belongsTo(PaymentStatus::class, 'payment_status_id');
    }


    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }
    
}
