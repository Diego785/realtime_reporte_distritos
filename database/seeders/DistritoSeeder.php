<?php

namespace Database\Seeders;

use App\Models\Distrito;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DistritoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $distritos = [
            'ASCENCIÓN DE GUARAYOS',
            'AYACUCHO/PORONGO',
            'BUENA VISTA',
            'BOYUIBE',
            'CABEZAS',
            'CAMIRI',
            'CHARAGUA',
            'COMARAPA',
            'CONCEPCION',
            'COTOCA',
            'CUATRO CAÑADAS',
            'CUEVO',
            'EL PUENTE',
            'EL TORNO',
            'GENERAL SAAVEDRA',
            'GUTIERREZ',
            'LA GUARDIA',
            'LAGUNILLAS',
            'MAIRANA',
            'MINEROS',
            'MONTERO',
            'MORO MORO',
            'OKINAWA',
            'PAILON',
            'PAMPA GRANDE',
            'PLAN TRES MIL',
            'PORTACHUELO',
            'POSTRERVALLE',
            'PUCARA',
            'PUERTO QUIJARRO',
            'PUERTO SUAREZ',
            'QUIRUSILLLAS',
            'ROBORE',
            'SAIPINA',
            'SAMAIPATA',
            'SAN ANTONIO DE LOMERIO',
            'SAN CARLOS',
            'SAN IGNACIO DE VELASCO',
            'SAN JAVIER',
            'SAN JOSE DE CHIQUITOS',
            'SAN JUAN DE YAPACANI',
            'SAN JULIAN',
            'SAN MATIAS',
            'SAN RAFAEL',
            'SAN MIGUEL (C. SAN MIGUEL DE VELASCO)',
            'SANTA CRUZ 1',
            'SANTA CRUZ 2',
            'SANTA CRUZ 3',
            'SANTA ROSA DEL SARA',
            'TRIGAL',
            'URUBICHA',
            'VALLE GRANDE',
            'WARNES',
            'YAPACANI',
        ];

        foreach ($distritos as $distrito) {
            Distrito::create(['nombre' => $distrito]);
        }
    }
}
