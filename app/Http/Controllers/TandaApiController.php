<?php

namespace App\Http\Controllers;

use App\Models\Resultado;
use App\Models\Tanda;
use Illuminate\Http\Request;

class TandaApiController extends Controller
{
    public function store (Request $request){

        // validacion
        $data = $request->validate([
            "numero_pepitas" => "required|integer|min:1",
            "penalizacion_pepita_no_encontrada" => "required|integer|min:0",
            "participantes" => "required|array|min:1"
        ]);

        // crear la tanda
        $tanda = Tanda::create([
            "competidores" => count($data["participantes"]),
            "penalizacion_pepita_no_encontrada" => $data["penalizacion_pepita_no_encontrada"],
            "numero_pepitas" => $data["numero_pepitas"],
        ]);

        // crear resultados
        foreach ($data["participantes"] as $participanteId) {
            Resultado::create([
                "tanda_id" => $tanda->id,
                "participante_id" => $participanteId,
                "tiempo" => rand(120, 300),
                "pepitas_encontradas" => rand(1, $tanda->numero_pepitas),
            ]);
        }

        return response()->json([
            "mensaje" => "Tanda {$tanda->id} creada correctamente."
        ]);

    }
}
