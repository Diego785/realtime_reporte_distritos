<?php

namespace Database\Seeders;

use App\Models\Distrito;
use App\Models\Encuesta;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DistritoEncuestaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Retrieve all the Distritos and Encuestas
        $distritos = Distrito::all();
        $encuestas = Encuesta::all();

        // Loop through each Encuesta and Distrito
        foreach ($encuestas as $encuesta) {
            foreach ($distritos as $distrito) {
                // Insert a row in the distrito_encuesta table
                DB::table('distrito_encuesta')->insert([
                    'encuesta_id' => $encuesta->id,
                    'distrito_id' => $distrito->id,
                    'estado_encuesta' => $this->randomEstado(), // Optional: Random or predefined status
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
        /**
     * Generate a random status for estado_encuesta.
     */

     private function randomEstado(): string
     {
         $estados = ['Pendiente', 'Completado', 'En proceso'];
         return $estados[array_rand($estados)];
     }
}
