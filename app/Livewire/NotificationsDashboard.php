<?php

namespace App\Livewire;

use App\Models\Notification;
use Livewire\Component;

class NotificationsDashboard extends Component
{
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
        $notifications = Notification::orderBy('created_at', 'desc')->take(50)->get();
        $hasUnread = Notification::where('is_read', false)->exists();

        return view('livewire.notifications-dashboard', compact('notifications', 'hasUnread'));
    }
}
