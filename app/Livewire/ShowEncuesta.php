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

    public function mount()
    {
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
