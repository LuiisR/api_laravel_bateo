<?php

use App\Http\Controllers\PenalizacionApiController;
use App\Http\Controllers\ResultadoApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::get("penalizaciones", [PenalizacionApiController::class, "index"]);
Route::get("clasificacion/{tanda}/mejores", [ResultadoApiController::class, "mejores"]);
Route::get("clasificacion/{tanda}", [ResultadoApiController::class, "clasificacion"]);
