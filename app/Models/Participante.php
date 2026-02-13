<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Participante extends Model
{
    protected $table = "participantes";
    public $timestamps = false;

    public function resultados() {
        return $this->hasMany(Resultado::class);
    }
}
