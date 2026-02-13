<?php

namespace App\Http\Controllers;

use App\Http\Resources\PenalizacionResource;
use App\Models\Penalizacion;
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
