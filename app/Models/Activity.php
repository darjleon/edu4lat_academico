<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

    protected $fillable = [
        'id', 'activity_type_id', 'nivel', 'area', 'enunciado', 'opciones', 'respuesta', 'adjunto',
    ];
}
