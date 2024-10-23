<?php

namespace App\Livewire\Admin\User;


use App\Models\UsersIntranet;
use Livewire\Component;

class InfoUser extends Component
{

    public $open = false;
    public $userId, $user;


    public function mount($userId)
    {
        // Cargar datos del usuario
        $this->user = UsersIntranet::with('profileData')->find($userId);
    }

    public function render()
    {
        return view('livewire.admin.user.info-user');
    }
}
