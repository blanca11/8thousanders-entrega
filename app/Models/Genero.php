<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Genero extends Model
{
    protected $table      = 'genero';
    protected $primaryKey = 'id_genero';
    public    $timestamps = false;
    protected $fillable   = ['nombre_genero'];

    public function subgeneros()
    {
        return $this->hasMany(Subgenero::class, 'id_genero', 'id_genero');
    }

    public function artistas()
    {
        return $this->hasMany(Artista::class, 'id_genero', 'id_genero');
    }
}
