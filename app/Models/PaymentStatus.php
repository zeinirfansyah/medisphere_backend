<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentStatus extends Model
{
    use HasFactory;


    protected $fillable = ['payment_status_name', 'uid'];


    protected $casts = [
        'uid' => 'string',
    ];


    public function payment()
    {
        return $this->hasMany(Payment::class);
    }
}
