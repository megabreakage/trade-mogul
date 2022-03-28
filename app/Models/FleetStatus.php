<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class FleetStatus extends Model
{
    use HasFactory;

    protected $fillable = [
        'identifier', 'name'
    ];

    public function truck(): BelongsToMany
    {
        return $this->belongsToMany(Fleet::class);
    }
}
