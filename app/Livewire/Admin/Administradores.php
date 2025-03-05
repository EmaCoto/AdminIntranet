<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User;

class Administradores extends Component
{
    use WithPagination;

    public $search = '';
    protected $listeners = ['render'];

    public function resetSearch()
    {
        $this->reset('search');
        $this->resetPage(); // Resetear la paginación al limpiar la búsqueda
    }
    
    public function updatingSearch()
    {
        $this->resetPage(); // Resetear la paginación cuando cambia el search
    }

    public function render()
    {
        $users = User::when($this->search, function ($query) {
                $query->where('name', 'LIKE', "%{$this->search}%")
                      ->orWhere('email', 'LIKE', "%{$this->search}%");
            })
            ->paginate(10);

        return view('livewire.admin.administradores', compact('users'));
    }
}
