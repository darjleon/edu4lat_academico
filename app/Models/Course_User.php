<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course_User extends Model
{
    use HasFactory;

    protected $fillable = [
        'id', 'curso_id', 'libro_id',
    ];
}
