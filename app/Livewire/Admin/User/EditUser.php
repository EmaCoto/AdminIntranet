<?php

namespace App\Livewire\Admin\User;

use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditUser extends Component
{
    use WithFileUploads;
    public $open = false;
    public $name, $email;
    public $userId, $user;

    public function mount($userId)
    {
        $this->userId = $userId;
        $this->user = User::find($userId);

        $this->name = $this->user->name;
        $this->email = $this->user->email;
    }

    public function update()
    {
        // $this->validate([
        //     'name' => 'required|string|max:255',
        //     'email' => 'required|string',
        // ]);

        $user = User::find($this->userId);
        $user->name = $this->name;
        $user->email = $this->email;

        $user->save();
        $this->reset('open');
        $this->dispatch('render');
    }
    public function render()
    {
        return view('livewire.admin.user.edit-user');
    }
}
