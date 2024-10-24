<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Distrito extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
    ];

    public function encuestas()
    {
        return $this->belongsToMany(Encuesta::class, 'distrito_encuesta')->withPivot('estado_encuesta');
    }
}
