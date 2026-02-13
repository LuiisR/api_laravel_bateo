<?php

namespace App\Http\Controllers;

use App\Http\Resources\ClasificacionResource;
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

    public function clasificacion(Tanda $tanda){

        $resultados = $tanda->resultados()
            ->with("participante", "penalizaciones")
            ->get()
            ->map(function ($resultado) use ($tanda) {

            // penalizacion por pepitas no encontradas
                $pepitasNoEncontradas = $tanda->numero_pepitas - $resultado->pepitas_encontradas;

                $tiempoPenalizacionPepitas = $pepitasNoEncontradas * $tanda->penalizacion_pepita_no_encontrada;

                // penalizaciones individuales
                $tiempoPenalizaciones = $resultado->penalizaciones->sum("tiempo");


                $tiempoFinal = $resultado->tiempo + $tiempoPenalizaciones + $tiempoPenalizacionPepitas;

                // guardar datos calculados en el objeto (sin hacer save en la bbdd)
                $resultado->tiempo_final = $tiempoFinal;
                $resultado->tiempo_penalizacion_pepitas = $tiempoPenalizacionPepitas;
                $resultado->tiempo_penalizaciones = $tiempoPenalizaciones;

                return $resultado;

            })->sortBy("tiempo_final")->values();

            return ClasificacionResource::collection($resultados);

    }
}
