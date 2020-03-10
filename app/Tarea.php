<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tarea extends Model
{
    protected $fillable = [
        'categoria_id', 'user_id',
        'nombre_Tarea', 'prioridad',
        'fecha_Inicio', 'fecha_Fin',
        'descripcion'
    ];
    protected $dates = ['fecha_Inicio', 'fecha_Fin', 'created_at', 'updated_at'];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }
}
