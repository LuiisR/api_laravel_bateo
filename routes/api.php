<?php

use App\Http\Controllers\PenalizacionApiController;
use App\Http\Controllers\ResultadoApiController;
use App\Http\Controllers\TandaApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::get("penalizaciones", [PenalizacionApiController::class, "index"]);
Route::get("clasificacion/{tanda}/mejores", [ResultadoApiController::class, "mejores"]);
Route::get("clasificacion/{tanda}", [ResultadoApiController::class, "clasificacion"]);
Route::post("tanda", [TandaApiController::class, "store"]);
Route::put("penalizar", [PenalizacionApiController::class, "penalizar"]);
Route::delete("tanda/{tanda}", [TandaApiController::class, "borraResultados"]);
