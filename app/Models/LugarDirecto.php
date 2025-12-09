<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LugarDirecto extends Model
{
    protected $table      = 'lugar_directo';
    protected $primaryKey = 'id_lugar';
    public    $timestamps = false; 

    // Campos rellenables mediante asignación masiva
    protected $fillable   = [
        'ciudad',
        'nombre',
        'es_festival',
    ];
}
