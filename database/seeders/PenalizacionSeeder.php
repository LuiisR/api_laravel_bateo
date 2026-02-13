<?php

namespace Database\Seeders;

use App\Models\Penalizacion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PenalizacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $penalizaciones = [
            ['nombre' => 'Pepita no encontrada', 'tiempo' => 45.000],
            ['nombre' => 'Falta de equipo', 'tiempo' => 10.500],
            ['nombre' => 'Retraso', 'tiempo' => 5.250],
        ];

        foreach ($penalizaciones as $p) {
            Penalizacion::create($p);
        }
    }
}
