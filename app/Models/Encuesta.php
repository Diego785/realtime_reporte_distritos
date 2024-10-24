<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Encuesta extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'descripcion',
        'enlace',
        'progreso_encuesta',
        'user_id',
    ];

    public function distritos()
    {
        return $this->belongsToMany(Distrito::class, 'distrito_encuesta')->withPivot('estado_encuesta');
    } 

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    } 
}
