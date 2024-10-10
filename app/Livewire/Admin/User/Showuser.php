<?php

namespace App\Livewire\Admin\User;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\On;

class Showuser extends Component
{
    public $users;

    public function mount(){
        $this->users = User::all();
    }
    public function deleteUser($id)
    {
        User::find($id)->delete();
        return redirect()->to('admin/showuser');
    }

    #[On('render')]
    public function render()
    {
        return view('livewire.admin.user.showuser');
    }
}
