<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Institution extends Model
{
    use HasFactory;

    protected $fillable = [
        'id', 'nombre', 'descripcion',
        'logo', 'provincia', 'ciudad',
        'parroquia', 'direccion', 'indicaciones extra',
        'web', 'facebook', 'twitter',
        'instagram', 'youtube', 'correo',
        'telefono', 'celular',
    ];
}
