<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ComentarioDisco extends Model
{
    protected $table      = 'comentario_disco';
    protected $primaryKey = 'id_comentario_disco';
    public    $timestamps = true;

    protected $fillable   = [
        'id_disco',
        'id_usuario',
        'comentario',
        'puntuacion',
    ];

    public function disco()
    {
        return $this->belongsTo(Disco::class, 'id_disco', 'id_disco');
    }

    public function usuario()
    {
        return $this->belongsTo(User::class, 'id_usuario', 'id');
    }
}
