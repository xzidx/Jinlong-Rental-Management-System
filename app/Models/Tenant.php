<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tenant extends Model
{
    protected $fillable = [
        'first_name','last_name','email','phone',
        'id_card_number','emergency_contact_name',
        'emergency_contact_phone','address','is_active'
    ];

    public function leases()
    {
        return $this->hasMany(Lease::class);
    }
}
