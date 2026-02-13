<?php

namespace Database\Seeders;

use App\Models\Participante;
use App\Models\Penalizacion;
use App\Models\Resultado;
use App\Models\Tanda;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ResultadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tandas = Tanda::all();
        $participantes = Participante::all();
        $penalizaciones = Penalizacion::all();

        foreach ($tandas as $tanda) {
            foreach ($participantes as $participante) {
                $resultado = Resultado::create([
                    "tanda_id" => $tanda->id,
                    "participante_id" => $participante->id,
                    "tiempo" => rand(50, 300) / 10,
                    "pepitas_encontradas" => rand(0, $tanda->numero_pepitas),
                ]);

                $resultado->penalizaciones()->attach(
                    $penalizaciones->random(rand(0, $penalizaciones->count()))->pluck("id")->toArray()
                );
            }
        }
    }
}
