<?php

namespace App\Http\Controllers;

use App\Http\Requests\PenalizarRequest;
use App\Http\Resources\PenalizacionResource;
use App\Models\Penalizacion;
use App\Models\Resultado;
use Illuminate\Http\Request;

class PenalizacionApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $penalizaciones = Penalizacion::with("resultados.participante")->get();
        return PenalizacionResource::collection($penalizaciones);
    }

    public function penalizar(PenalizarRequest $request){
        $data = $request->validated();

        // busca el resultado del participante en esa tanda
        $resultado = Resultado::where("tanda_id", $data["tanda_id"])
            ->where("participante_id", $data["participante_id"])->first();

        // si no existe devuelve mensaje de error
        if (!$resultado) {
            return response()->json([
                "mensaje" => "No hay ningún resultado para la tanda indicada."
            ], 404);
        }

        // si sí existe, se añade la penalización
        $resultado->penalizaciones()->attach($data["penalizacion_id"]);

        return response()->json([
            "mensaje" => "Penalización añadida"
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
