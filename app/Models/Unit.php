<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;

    protected $fillable = ['unit_name', 'uid'];

    protected $casts = [
        'uid' => 'string',
    ];
    
    public function product()
    {
        return $this->hasMany(Product::class, 'unit_id');
    }
}
