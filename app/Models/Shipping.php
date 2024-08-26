<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    use HasFactory;

    protected $fillable = [
        'recipient_name',
        'recipient_phone',
        'address_line_1',
        'address_line_2',
        'city',
        'state',
        'postal_code',
        'country',
        'order_id',
        'shipping_status_id',
        'uid'
    ];

    protected $casts = [
        'uid' => 'string',
    ];


    public function order()
    {
        return $this->belongsTo(Order::class);
    }


    public function shippingStatus()
    {
        return $this->belongsTo(ShippingStatus::class);
    }

}
