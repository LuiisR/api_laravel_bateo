<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tanda extends Model
{
    protected $table = "tandas";
    public $timestamps = false;
    protected $fillable = [
    'competidores',
    'penalizacion_pepita_no_encontrada',
    "numero_pepitas"
];

    public function resultados(){
        return $this->hasMany(Resultado::class);
    }

}
