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
    public $receivedMessage, $message;

    // protected $listeners = ['actualizandoProgreso'];

    public $progress = 0;

    // protected $listeners = ['progressUpdated'];
    protected $listeners = [
        'messageReceived' => 'handleMessageReceived',
        'progressUpdated' => 'updateProgress' // Listen for progress updates
    ];


    //----------------------------- SOCKETS -----------------------------------//

    public function sendMessage()
    {
        $this->dispatch('socket-message-sent', message: $this->message, progress: $this->progress + 5);
        $this->message = ''; // Clear the message
    }
    public function handleMessageReceived($message)
    {
        // Maneja el mensaje recibido del servidor de sockets
        // Asigna el mensaje a una propiedad de Livewire
        $this->receivedMessage = $message;
        $this->emit('messageReceived', $message);
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
