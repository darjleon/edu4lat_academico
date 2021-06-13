<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $fillable = [
        'id', 'titulo', 'descripcion', 'portada','area','nivel',
    ];

    public function cursos()
    {
        return $this->belongsToMany(
            Course::class,
            'course__books',
            'libro_id',
            'curso_id'
        )->withPivot('docente_id', 'updated_at', 'id');
    }
}
