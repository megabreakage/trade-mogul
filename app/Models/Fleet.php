<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fleet extends Model
{
    use HasFactory;

    protected $fillable = [
        'identifier', 'fleet_status_id', 'registration_number', 'model', 'year_of_manufacture',
    ];
}
