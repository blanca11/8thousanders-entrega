<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Directo extends Model
{
    protected $table      = 'directo';
    protected $primaryKey = 'id_directo';
    public    $timestamps = false;

    protected $fillable   = [
        'id_artista',
        'id_lugar',
        'fecha',
    ];

    protected $casts = [
        'fecha' => 'datetime',
    ];

    // Relación con Artista
    public function artista()
    {
        return $this->belongsTo(Artista::class, 'id_artista', 'id_artista');
    }

    // Relación con LugarDirecto
    public function lugar()
    {
        return $this->belongsTo(LugarDirecto::class, 'id_lugar', 'id_lugar');
    }

    // Relación con ComentarioDirecto
    public function comentarios()
    {
        return $this->hasMany(ComentarioDirecto::class, 'id_directo', 'id_directo');
    }
}
