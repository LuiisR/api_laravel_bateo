<?php

namespace Database\Seeders;

use App\Models\Tanda;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TandaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i=0; $i < 3; $i++) {
            Tanda::create([
                "competidores" => 30,
                "penalizacion_pepita_no_encontrada" => 45.000,
                "numero_pepitas" => rand(20, 50)
            ]);
        }
    }
}
