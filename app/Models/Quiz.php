<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;

    protected $fillable = [
        'id', 'creador_id', 'titulo', 'curso', 'nivel', 'area', 'descripcion', 'inicio', 'fin', 'estado',
    ];
    
    public function activities()
    {
        return $this->belongsToMany(
            Activity::class,
            'activities__quizzes',
            'prueba_id',
            'actividad'
        );
    }
}
