<?php

namespace Database\Seeders;

use App\Models\Encuesta;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UpdateProgresoEncuestaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Retrieve all Encuestas
        $encuestas = Encuesta::all();

        foreach ($encuestas as $encuesta) {
            // Count total distritos for this encuesta
            $totalDistritos = DB::table('distrito_encuesta')
                ->where('encuesta_id', $encuesta->id)
                ->count();

            // Count completed distritos for this encuesta
            $completedDistritos = DB::table('distrito_encuesta')
                ->where('encuesta_id', $encuesta->id)
                ->where('estado_encuesta', 'Completado')
                ->count();

            // Calculate progress as a percentage
            $progress = $totalDistritos > 0 ? ($completedDistritos / $totalDistritos) * 100 : 0;

            // Update progreso_encuesta in the encuestas table
            $encuesta->progreso_encuesta = round($progress); // Round to nearest integer
            $encuesta->save(); // Save the updated encuesta
        }
    }
}
