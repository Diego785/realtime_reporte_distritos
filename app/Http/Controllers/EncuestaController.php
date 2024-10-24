<?php

namespace App\Http\Controllers;

use App\Models\Encuesta;
use Illuminate\Http\Request;

class EncuestaController extends Controller
{
    public function showEncuestas(){
        return view('app.encuesta.show');
    }

    public function showDistritosEncuesta(Encuesta $encuesta){
        return view('app.encuesta.show-distritos-encuesta', compact('encuesta'));
    }
}
