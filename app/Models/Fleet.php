<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Fleet extends Model
{
    use HasFactory;

    protected $fillable = [
        'identifier', 'fleet_status_id', 'registration_number', 'model', 'manufactured_at',
    ];

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }

    public function fleet_status(): BelongsTo
    {
        return $this->belongsTo(FleetStatus::class);
    }

    public function location(): BelongsTo
    {
        return $this->belongsTo(Location::class);
    }
}
