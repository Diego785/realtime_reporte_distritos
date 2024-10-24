<?php

namespace App\Livewire;

use App\Models\Encuesta;
use Livewire\Component;
use Livewire\WithPagination;

use Google\Client;
use Google\Service\Forms;
use Google\Service\Sheets;
use Google_Client;
use Google_Service_Sheets;

class ShowEncuesta extends Component
{

    use WithPagination;

    public $responses = [];

    public $search;

    // protected $listeners = ['actualizandoProgreso'];

    public $progress = 10000;

    protected $listeners = ['progressUpdated'];


    public function mount()
    {
    }

    // public function actualizandoProgreso($encuesta)
    // {
    //     $encuesta_updating = Encuesta::find($encuesta);
    //     $encuesta_updating->progreso_encuesta = $encuesta_updating->progreso_encuesta + 5;
    //     $encuesta_updating->save();
    //     // dd($encuesta_updating->progreso_encuesta);
    // }
    
    public function progressUpdated($progress)
    {
        dd($progress);

        $this->progress = $progress;
    }



    public function render()
    {
        $encuestas = Encuesta::where('titulo', 'like', '%' . $this->search . '%')
            ->simplePaginate(5);
        return view('livewire.show-encuesta', [
            'encuestas' => $encuestas,
            'responses' => $this->responses,
        ]);
    }
}
