<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tramite extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'tipo_id',
        'usuario_id',
        'fecha_inicio',
        'fecha_vencimiento',
    ];

    public function tipo()
    {
        return $this->belongsTo(Tipo::class);
    }

    public function usuario()
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }
}
