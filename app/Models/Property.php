<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'city',
        'district',
        'type',
        'total_units',
        'construction_year',
        'description',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    // Relationship with Unit
    public function units()
    {
        return $this->hasMany(Unit::class);
    }
}
