<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dependencia extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', // Incluye user_id en el array fillable
        'nombre',
        'correo',
        'telefono',
        'dependencia',
        'estado',
    ];

    public function tipos()
    {
        return $this->hasMany(Tipo::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

