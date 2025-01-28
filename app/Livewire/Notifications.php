<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Notification;

class Notifications extends Component
{
    public $open = false;
    protected $listeners = ['render'];

    public function updatedOpen($value)
    {
        if ($value) {
            // Marcar todas las notificaciones como leídas
            Notification::where('is_read', false)->update(['is_read' => true]);
        }
    }

    public function render()
    {
        // Cargar todas las notificaciones de la base de datos
        $notifications = Notification::orderBy('created_at', 'desc')->take(30)->get();
        $hasUnread = Notification::where('is_read', false)->exists();

        return view('livewire.notifications', compact('notifications', 'hasUnread'));
    }
}