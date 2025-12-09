<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Artista extends Model
{
    protected $table      = 'artista';
    protected $primaryKey = 'id_artista';
    public    $timestamps = false;
    protected $fillable   = [
        'nombre',
        'ciudad',
        'pais',
        'id_genero',
        'id_subgenero',
    ];

    public function genero()
    {
        return $this->belongsTo(Genero::class, 'id_genero', 'id_genero');
    }

    public function subgenero()
    {
        return $this->belongsTo(Subgenero::class, 'id_subgenero', 'id_subgenero');
    }

    public function discos()
    {
        return $this->hasMany(Disco::class, 'id_artista', 'id_artista');
    }

    public function directos()
    {
        return $this->hasMany(Directo::class, 'id_artista', 'id_artista');
    }
}
