<?php

namespace App\Http\Controllers;

use App\Http\Resources\MejorResultadoResource;
use App\Http\Resources\ParticipantePepitasResource;
use App\Models\Tanda;
use Illuminate\Http\Request;

class ResultadoApiController extends Controller
{
    public function mejores(Tanda $tanda){

        //obtiene el num max de pepitas encontradas en esa tanda
        $maxPepitas = $tanda->resultados->max("pepitas_encontradas");

        //filtra los resiltados que tengan ese máximo
        $mejoresResultados = $tanda->resultados()->where("pepitas_encontradas", $maxPepitas)->with("participante")->get();

        return ParticipantePepitasResource::collection($mejoresResultados);
    }
}
