<?php

namespace App\Livewire\Admin\User;

use App\Models\User;
use Livewire\Component;

class InfoUser extends Component
{
    public $open = false;
    public $user, $userId;

    public function mount($userId)
    {
        $this->userId = $userId;
        $this->user = User::find($userId);

    }
    public function render()
    {
        return view('livewire.admin.user.info-user');
    }
}
