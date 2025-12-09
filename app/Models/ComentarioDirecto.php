<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ComentarioDirecto extends Model
{
    protected $table      = 'comentario_directo';
    protected $primaryKey = 'id_comentario_directo';
    public    $timestamps = true;

    protected $fillable   = [
        'id_directo',
        'id_usuario',
        'comentario',
        'puntuacion',
    ];

    // Relación con Directo
    public function directo()
    {
        return $this->belongsTo(Directo::class, 'id_directo', 'id_directo');
    }

    // Relación con User
    public function usuario()
    {
        return $this->belongsTo(User::class, 'id_usuario', 'id');
    }
}
