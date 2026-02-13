<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MejorResultadoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        //calcular el tiempo de penalizacion de pepitas
        $penalizacionPepitas = ($this->tanda->penalizacion_pepita_no_encontrada ?? 0) * (($this->tanda->numero_pepitas ?? 0) - $this->pepitas_encontradas);

        //calcular el tiempo total de penalizaciones
        $tiempoPenalizaciones = $this->penalizaciones->sum("tiempo");

        return [
            "participante" => $this->participante->nombre . " " . $this->participante->apellidos,
            "pepitas_encontradas" => $this->pepitas_encontradas,
            "tiempo_resultado" => $this->tiempo,
            "tiempo_penalizacion_pepitas" => $penalizacionPepitas,
            "tiempo_penalizaciones" => $tiempoPenalizaciones,
            "tiempo_final" => $this->tiempo + $tiempoPenalizaciones + $penalizacionPepitas,
        ];
    }
}
