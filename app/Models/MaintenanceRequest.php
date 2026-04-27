<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaintenanceRequest extends Model
{
    use HasFactory;

    protected $table = 'maintenance_requests';

    protected $fillable = [
        'lease_id',
        'unit_id',
        'title',
        'description',
        'priority',
        'status',
        'requested_date',
        'scheduled_date',
        'completed_date',
        'resolution_notes',
        'cost',
    ];

    protected $casts = [
        'requested_date' => 'date',
        'scheduled_date' => 'date',
        'completed_date' => 'date',
        'cost' => 'decimal:2',
    ];

    // Relationships
    public function lease()
    {
        return $this->belongsTo(Lease::class);
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }
}
