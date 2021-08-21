<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area_Grade_Docente extends Model
{
    use HasFactory;
    protected $fillable = [
        'id', 'docente_id', 'area_id', 'nivel',
    ];
}
