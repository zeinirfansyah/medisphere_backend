<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;

    protected $fillable = ['purchase_date', 'purchase_tax', 'purchase_total', 'supplier_id', 'purchase_status_id', 'user_id', 'uid'];

    protected $casts = [
        'uid' => 'string',
    ];
    
    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id');
    }

    public function purchase_status()
    {
        return $this->belongsTo(PurchaseStatus::class, 'purchase_status_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function purchase_details()
    {
        return $this->hasMany(PurchaseDetail::class, 'purchase_id');
    }
}
