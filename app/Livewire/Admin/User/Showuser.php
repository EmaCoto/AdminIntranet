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
        $this->users = UsersIntranet::with(['profileData' => function ($query) {
            $query->orderBy('field_id'); // Ordenar por el campo que corresponde al tipo de dato
        }])->limit(10)->get();
    }

    public function confirmDeletion($ID)
    {
        $this->dispatchBrowserEvent('swal:confirm', [
            'id' => $ID
        ]);
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
