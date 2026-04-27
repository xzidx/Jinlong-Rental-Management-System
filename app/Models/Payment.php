<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'lease_id',
        'payment_method',
        'amount',
        'payment_date',
        'due_date',
        'status',
        'transaction_reference',
        'notes',
    ];

    protected $casts = [
        'payment_date' => 'date',
        'due_date' => 'date',
    ];

    // Relationship with Lease
    public function lease()
    {
        return $this->belongsTo(Lease::class);
    }
}
