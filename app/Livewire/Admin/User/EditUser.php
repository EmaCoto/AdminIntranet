<?php

namespace App\Livewire\Admin\User;

use App\Models\UsersIntranet;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditUser extends Component
{
    use WithFileUploads;
    public $open = false;
    public $user_login, $user_email;
    public $userId, $user;

    public function mount($userId)
    {
        $this->userId = $userId;
        $this->user = UsersIntranet::find($userId);

        $this->user_login = $this->user->user_login;
        $this->user_email = $this->user->user_email;
    }

    public function update()
    {
        // $this->validate([
        //     'user_login' => 'required|string|max:255',
        //     'user_email' => 'required|string',
        // ]);

        $user = UsersIntranet::find($this->userId);
        $user->user_login = $this->user_login;
        $user->user_email = $this->user_email;

        $user->save();
        $this->reset('open');
        $this->dispatch('render');
    }
    public function render()
    {
        return view('livewire.admin.user.edit-user');
    }
}
