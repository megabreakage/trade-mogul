<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FleetStatus extends Model
{
    use HasFactory;

    protected $fillable = [
        'identifier', 'name'
    ];
}
