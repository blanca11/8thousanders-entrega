<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Disco extends Model
{
    protected $table      = 'disco';
    protected $primaryKey = 'id_disco';
    public    $timestamps = false;

    protected $fillable   = [
        'id_artista',
        'titulo',
    ];

    public function artista()
    {
        return $this->belongsTo(Artista::class, 'id_artista', 'id_artista');
    }

    public function comentarios()
    {
        return $this->hasMany(ComentarioDisco::class, 'id_disco', 'id_disco');
    }
}
