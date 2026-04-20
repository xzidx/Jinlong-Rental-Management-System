<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $fillable = [
        'name','address','city','district','type',
        'total_units','construction_year','description','is_active'
    ];

    public function units()
    {
        return $this->hasMany(Unit::class);
    }
}
