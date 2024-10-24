<?php

namespace App\Livewire;

use App\Models\Distrito;
use Livewire\Component;

class ShowDistritosEncuesta extends Component
{
    public $status = 0; // Default status
    public $observation = 0; // Default status
    // public $progress; // Progress in % from 0 to 100
    public $distritos = [];
    public $encuesta;

    public function mount($encuesta)
    {
        $this->distritos = Distrito::with('encuestas')->get();
        $this->encuesta = $encuesta;
        // Calculate progress based on completed status
        // $this->calculateProgress();
    }

    public function updatedStatus()
    {
        $this->filterDistritos();
    }

    public function filterDistritos()
    {
        if ($this->status) {
            $this->distritos = Distrito::whereHas('encuestas', function ($query) {
                $query->where('estado_encuesta', $this->status)
                    ->where('encuesta_id', $this->encuesta->id); // Filter by encuesta_id
            })->get();
        } else {
            $this->distritos = Distrito::whereHas('encuestas', function ($query) {
                $query->where('encuesta_id', $this->encuesta->id);
            })->get();
        }
    }

    // public function calculateProgress()
    // {
    //     // Get total distritos for the encuesta
    //     $totalDistritos = Distrito::whereHas('encuestas', function ($query) {
    //         $query->where('encuesta_id', $this->encuesta->id);
    //     })->count();

    //     // Get completed distritos for the encuesta
    //     $completedDistritos = Distrito::whereHas('encuestas', function ($query) {
    //         $query->where('estado_encuesta', 'Completado')
    //             ->where('encuesta_id', $this->encuesta->id);
    //     })->count();

    //     // Calculate the progress percentage
    //     if ($totalDistritos > 0) {
    //         $this->progress = ($completedDistritos / $totalDistritos) * 100;
    //     } else {
    //         $this->progress = 0; // No distritos, progress is 0%
    //     }
    // }
    public function render()
    {
        return view('livewire.show-distritos-encuesta', [
            'distritos' => $this->distritos,
        ]);
    }
}
