<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipo extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'costo',
        'dependencia_id',
        'estado',
        'tipo',
    ];

    public function dependencia()
    {
        return $this->belongsTo(Dependencia::class);
    }
}
