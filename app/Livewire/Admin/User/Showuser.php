<?php

namespace App\Livewire\Admin\User;

use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class ShowUser extends Component
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
       
    public function deleteUser($ID)
    {
        DB::connection('wordpress')->table('dxv_bp_xprofile_data')
            ->updateOrInsert(
                ['user_id' => $ID, 'field_id' => 50], // Campo 50 = Etiqueta
                ['value' => 'USUARIO DEPURADO', 'last_updated' => now()]
            );
    
        $this->dispatch('render'); // Para actualizar la vista
    }    

    public function render()
    {
        $users = DB::connection('wordpress')
            ->table('dxv_users')
            ->select([
                'dxv_users.ID',
                'dxv_users.user_login',
                'fn.value as first_name',
                'ln.value as last_name',
                'jt.value as job_title',
                't.name as cargo' // Obteniendo el nombre del cargo
            ])
            ->leftJoin('dxv_bp_xprofile_data as fn', function ($join) {
                $join->on('dxv_users.ID', '=', 'fn.user_id')
                     ->where('fn.field_id', '=', 1);
            })
            ->leftJoin('dxv_bp_xprofile_data as ln', function ($join) {
                $join->on('dxv_users.ID', '=', 'ln.user_id')
                     ->where('ln.field_id', '=', 2);
            })
            ->leftJoin('dxv_bp_xprofile_data as jt', function ($join) {
                $join->on('dxv_users.ID', '=', 'jt.user_id')
                     ->where('jt.field_id', '=', 50);
            })
            ->leftJoin('dxv_term_relationships as tr', function ($join) {
                $join->on('dxv_users.ID', '=', 'tr.object_id');
            })
            ->leftJoin('dxv_term_taxonomy as tt', function ($join) {
                $join->on('tr.term_taxonomy_id', '=', 'tt.term_taxonomy_id')
                     ->where('tt.taxonomy', 'bp_member_type');
            })
            ->leftJoin('dxv_terms as t', function ($join) {
                $join->on('tt.term_id', '=', 't.term_id'); // Trae el nombre del cargo desde dxv_terms
            })
            ->when($this->search, function ($query) {
                $query->where(function ($subQuery) {
                    $subQuery->where('fn.value', 'LIKE', "%{$this->search}%")
                            ->orWhere('ln.value', 'LIKE', "%{$this->search}%")
                            ->orWhere('jt.value', 'LIKE', "%{$this->search}%");
                });
            })
            ->where(function ($query) {
                $query->whereNull('jt.value')
                      ->orWhere('jt.value', '!=', 'USUARIO DEPURADO');
            })
            ->paginate(1);
    
        return view('livewire.admin.user.showuser', compact('users'));
    }    
}