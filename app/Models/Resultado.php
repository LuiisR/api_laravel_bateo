<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Resultado extends Model
{
    protected $table = "resultados";
    public $timestamps = false;
    protected $fillable = [
    'tanda_id',
    'participante_id',
    'tiempo',
    'pepitas_encontradas',
];

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
