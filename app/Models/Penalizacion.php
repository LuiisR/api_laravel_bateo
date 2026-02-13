<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penalizacion extends Model
{
    protected $table = "penalizaciones";
    public $timestamps = false;

    public function resultados()
{
    return $this->belongsToMany(Resultado::class);
}

    public function participantesList() {
        return $this->resultados->map(function($resultado) {
            return $resultado->participante;
        });
    }
}
