<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PenalizacionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "nombre" => $this->nombre,
            "tiempo" => $this->tiempo,
            //"participantes" => ResultadoResource::collection($this->resultados)
            "participantes" => ParticipanteResource::collection($this->participantesList()),
        ];
    }
}
