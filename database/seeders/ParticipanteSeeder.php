<?php

namespace Database\Seeders;

use App\Models\Participante;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ParticipanteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $fakerGOAT = \Faker\Factory::create();

        for ($i=0; $i < 10; $i++) {
            $nombre = $fakerGOAT->firstName;
            $apellidos = $fakerGOAT->lastName;

            Participante::create([
                "nombre" => $nombre,
                "apellidos" => $apellidos,
                "slug" => Str::slug($nombre . " " . $apellidos)
            ]);
        }
    }
}
