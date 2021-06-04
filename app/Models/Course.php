<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $fillable = [
        'id', 'nombre', 'descripcion', 'institucion_id',
    ];

    public function libros()
    {
        return $this->belongsToMany(
            Book::class,
            'course__books',
            'curso_id',
            'libro_id'
        )->withPivot('docente_id', 'updated_at', 'id');
    }

    public function usuarios()
    {
        return $this->belongsToMany(
            User::class,
            'course__users',
            'curso_id',
            'usuario_id'
        )->withPivot('updated_at', 'id');
    }
}
