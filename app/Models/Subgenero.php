<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subgenero extends Model
{
    protected $table      = 'subgenero';
    protected $primaryKey = 'id_subgenero';
    public    $timestamps = false;
    protected $fillable   = ['id_genero', 'nombre_subgenero'];

    public function genero()
    {
        return $this->belongsTo(Genero::class, 'id_genero', 'id_genero');
    }

    public function artistas()
    {
        return $this->hasMany(Artista::class, 'id_subgenero', 'id_subgenero');
    }
}
