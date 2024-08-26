<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    protected $fillable = ['uid', 'supplier_name', 'supplier_contact_info', 'supplier_address'];


    protected $casts = [
        'uid' => 'string',
    ];

    public function supplyTransaction()
    {
        return $this->hasMany(SupplyTransaction::class);
    }

}
