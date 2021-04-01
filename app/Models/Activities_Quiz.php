<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activities_Quiz extends Model
{
    use HasFactory;
    protected $fillable = [
        'id', 'prueba_id', 'actividad',
    ];
}
