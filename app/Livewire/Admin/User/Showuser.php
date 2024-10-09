<?php

namespace App\Livewire\Admin\User;

use App\Models\User;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class Showuser extends Component
{
    public $users, $selectedUser;
    public $open = false;
    public $search;

    public function mount()
    {
        $this->users = User::all();
    }
    public function openmodal($userId)
    {
        $this->selectedUser = User::find($userId);
        $this->open = true;
    }

    public function deleteUser($id)
    {
       User::find($id)->delete();
        return redirect()->to('admin/showuser');
    }

    public function render()
    {
        return view('livewire.admin.user.showuser');
    }
}
