<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderStatus extends Model
{
    use HasFactory;

    protected $fillable = ['order_status_name', 'uid'];

    protected $casts = [
        'uid' => 'string',
    ];

    public function orders()
    {
        return $this->hasMany(Order::class, 'order_status_id');
    }
}
