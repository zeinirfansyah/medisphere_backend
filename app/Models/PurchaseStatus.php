<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseStatus extends Model
{
    use HasFactory;

    protected $fillable = ['purchase_status_name'];


    public function purchases()
    {
        return $this->hasMany(Purchase::class, 'purchase_status_id');
    }
}
