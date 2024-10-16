<?php

namespace App\Livewire\Admin\User;

use App\Models\UsersIntranet;
use Livewire\Component;
use Livewire\Attributes\On;


class Showuser extends Component
{
    public $users;

    public function mount()
    {
        $this->users = UsersIntranet::limit(10)->get();
    }

    public function deleteUser($ID)
    {
        UsersIntranet::find($ID)->delete();
        return redirect()->route('showuser');
    }

    #[On('render')]
    public function render()
    {
        return view('livewire.admin.user.showuser', ['users' => $this->users]);
    }
}
