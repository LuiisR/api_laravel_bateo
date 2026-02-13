<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tanda extends Model
{
    protected $table = "tandas";
    public $timestamps = false;

    public function resultados(){
        return $this->hasMany(Resultado::class);
    }
}
