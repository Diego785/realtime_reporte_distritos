<?php

namespace Database\Seeders;

use App\Models\Encuesta;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EncuestaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Encuesta::create([
            'titulo' => 'Encuesta de Satisfacción del Cliente',
            'descripcion' => 'Encuesta para medir la satisfacción de los clientes sobre el servicio ofrecido en las oficinas distritales.',
            'enlace' => 'https://forms.gle/satisfaccion-cliente-2024',
            'user_id' => 1,
        ]);

        Encuesta::create([
            'titulo' => 'Formulario de Inscripción a la Olimpiada de Matemáticas 2024',
            'descripcion' => 'Formulario para inscribir a los estudiantes interesados en participar en la Olimpiada de Matemáticas.',
            'enlace' => 'https://forms.gle/inscripcion-olimpiada-matematicas',
            'user_id' => 1,
        ]);

        Encuesta::create([
            'titulo' => 'Encuesta de Evaluación de los Docentes',
            'descripcion' => 'Encuesta para que los estudiantes evalúen el desempeño de sus docentes durante el año escolar.',
            'enlace' => 'https://forms.gle/evaluacion-docentes-2024',
            'user_id' => 2,
        ]);

        Encuesta::create([
            'titulo' => 'Registro para el Taller de Programación 2024',
            'descripcion' => 'Formulario para registrar a los participantes del taller de programación organizado por la DDE.',
            'enlace' => 'https://forms.gle/registro-taller-programacion',
            'user_id' => 1,
        ]);

        Encuesta::create([
            'titulo' => 'Encuesta de Opinión sobre el Uso de Tecnología en la Educación',
            'descripcion' => 'Encuesta para recopilar la opinión de los estudiantes y docentes sobre el uso de tecnología en las aulas.',
            'enlace' => 'https://forms.gle/opinion-tecnologia-educacion-2024',
            'user_id' => 2,
        ]);

        Encuesta::create([
            'titulo' => 'Encuesta de Clima Laboral 2024',
            'descripcion' => 'Encuesta para evaluar el clima laboral en las oficinas de la Dirección Departamental de Educación.',
            'enlace' => 'https://forms.gle/clima-laboral-2024',
            'user_id' => 1,
        ]);
    
        Encuesta::create([
            'titulo' => 'Encuesta sobre Actividades Extracurriculares 2024',
            'descripcion' => 'Formulario para que los estudiantes expresen su interés en participar en actividades extracurriculares.',
            'enlace' => 'https://forms.gle/actividades-extracurriculares',
            'user_id' => 1,
        ]);
    
        Encuesta::create([
            'titulo' => 'Encuesta de Participación en Eventos Culturales',
            'descripcion' => 'Encuesta para saber cuántos estudiantes están interesados en participar en los eventos culturales del 2024.',
            'enlace' => 'https://forms.gle/participacion-eventos-culturales',
            'user_id' => 2,
        ]);
    
        Encuesta::create([
            'titulo' => 'Formulario de Registro para la Feria de Ciencias 2024',
            'descripcion' => 'Formulario para el registro de proyectos y participantes en la Feria de Ciencias.',
            'enlace' => 'https://forms.gle/registro-feria-ciencias-2024',
            'user_id' => 2,
        ]);
    
        Encuesta::create([
            'titulo' => 'Encuesta de Opinión sobre la Nueva Plataforma Educativa',
            'descripcion' => 'Encuesta para recopilar las opiniones sobre el uso y efectividad de la nueva plataforma educativa.',
            'enlace' => 'https://forms.gle/opinion-plataforma-educativa',
            'user_id' => 1,
        ]);
        
        Encuesta::create([
            'titulo' => 'Formulario de Inscripción a Talleres de Verano 2024',
            'descripcion' => 'Formulario para inscribir a los estudiantes en los talleres de verano ofrecidos por la Dirección Departamental de Educación.',
            'enlace' => 'https://forms.gle/inscripcion-talleres-verano-2024',
            'user_id' => 2,
        ]);
    
        Encuesta::create([
            'titulo' => 'Encuesta de Opinión sobre la Calidad del Material Educativo',
            'descripcion' => 'Encuesta para evaluar la calidad del material educativo distribuido durante el año escolar 2024.',
            'enlace' => 'https://forms.gle/calidad-material-educativo',
            'user_id' => 1,
        ]);
    
        Encuesta::create([
            'titulo' => 'Formulario de Registro de Voluntarios para Eventos Escolares',
            'descripcion' => 'Formulario para registrar a los voluntarios interesados en colaborar en los eventos escolares del 2024.',
            'enlace' => 'https://forms.gle/registro-voluntarios-eventos',
            'user_id' => 1,
        ]);
    }
}
