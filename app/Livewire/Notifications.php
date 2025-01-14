<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Notification;

class Notifications extends Component
{
    public $open = false;

    public function render()
    {
        // Cargar todas las notificaciones de la base de datos
        $notifications = Notification::orderBy('created_at', 'desc')
        ->take(30)
        ->get();

        return view('livewire.notifications', compact('notifications'));
    }
}
