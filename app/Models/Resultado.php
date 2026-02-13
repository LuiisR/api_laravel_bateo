<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Resultado extends Model
{
    protected $table = "resultados";
    public $timestamps = false;

    public function participante()
{
    return $this->belongsTo(Participante::class);
}

public function tanda()
{
    return $this->belongsTo(Tanda::class);
}

public function penalizaciones()
{
    return $this->belongsToMany(Penalizacion::class);
}
}
