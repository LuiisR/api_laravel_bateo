<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ParticipantePepitasResource extends JsonResource
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
            "pepitas_encontradas" => $this->pepitas_encontradas,
        ];
    }
}
