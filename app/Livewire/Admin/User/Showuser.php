<?php

namespace App\Livewire\Admin\User;

use App\Models\UsersIntranet;
use App\Models\UsersIntranetExtendido;
use Illuminate\Support\Facades\DB;
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

    public function deleteUser($ID)
    {
        DB::transaction(function () use ($ID) {
            // Eliminar todos los registros en UsersIntranetExtendido relacionados al usuario
            UsersIntranetExtendido::where('user_id', $ID)->delete();
            // Eliminar el usuario en UsersIntranet
            UsersIntranet::findOrFail($ID)->delete();
        });

        return redirect()->route('showuser');
    }

    #[On('render')]
    public function render()
    {
        return view('livewire.admin.user.showuser', ['users' => $this->users]);
    }
}
