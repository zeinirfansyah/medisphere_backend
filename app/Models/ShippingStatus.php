<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShippingStatus extends Model
{
    use HasFactory;

    protected $fillable = ['shipping_status_name', 'uid'];

    protected $casts = [
        'uid' => 'string',
    ];


    public function shipping()
    {
        return $this->hasMany(Shipping::class);
    }
}
