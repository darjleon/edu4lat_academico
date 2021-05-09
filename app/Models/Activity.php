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

    public function quizzes()
    {
        return $this->belongsToMany(
            Quiz::class,
            'activities__quizzes',
            'actividad',
            'prueba_id'
        );
    }
}
