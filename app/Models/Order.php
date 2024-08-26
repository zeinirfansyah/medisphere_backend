<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_date',
        'tax',
        'total_price',
        'user_id',
        'order_status_id',
        'uid'
    ];

    protected $casts = [
        'uid' => 'string',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function order_status()
    {
        return $this->belongsTo(OrderStatus::class);
    }

    public function shipping()
    {
        return $this->hasMany(Shipping::class);
    }

    public function orderItem()
    {
        return $this->hasMany(OrderItem::class);
    }


    public function payment()
    {
        return $this->hasMany(Payment::class);
    }
}
