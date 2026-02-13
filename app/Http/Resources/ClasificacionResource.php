<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ClasificacionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return[
            "participante" => $this->participante->nombre . " " . $this->participante->apellidos,
            "tiempo_final" => $this->tiempo_final,
            "tiempo" => $this->tiempo,
            "pepitas_encontradas" => $this->pepitas_encontradas,
            "tiempo_penalizacion_pepitas" => $this->tiempo_penalizacion_pepitas,
            "tiempo_penalizaciones" => $this->tiempo_penalizaciones,
        ];
    }
}
