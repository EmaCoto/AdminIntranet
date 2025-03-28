<?php

namespace App\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class Vacio extends Component
{
    use WithPagination;

    public $search = '';
    protected $listeners = ['render'];

    protected $fieldIds = [
        1, 2, 999, 1000, 558, 78, 302, 559, 76, 288, 53, 760, 50, 212, 324, 325
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        // Obtener usuarios que no tienen algún campo requerido o no tienen perfil
        $users = DB::connection('wordpress')
            ->table('dxv_users as u')
            ->select('u.ID', 'u.user_login', 'fn.value as first_name', 'ln.value as last_name')
            ->leftJoin('dxv_bp_xprofile_data as fn', function ($join) {
                $join->on('u.ID', '=', 'fn.user_id')
                     ->where('fn.field_id', 1);
            })
            ->leftJoin('dxv_bp_xprofile_data as ln', function ($join) {
                $join->on('u.ID', '=', 'ln.user_id')
                     ->where('ln.field_id', 2);
            })
            ->where(function ($query) {
                // Subconsulta: contar cuántos campos requeridos tiene el usuario
                $query->whereRaw("
                    (
                        SELECT COUNT(DISTINCT field_id) 
                        FROM dxv_bp_xprofile_data 
                        WHERE user_id = u.ID 
                        AND field_id IN (" . implode(',', $this->fieldIds) . ")
                        AND value IS NOT NULL AND TRIM(value) != ''
                    ) < " . count($this->fieldIds)
                )
                ->orWhereRaw("
                    NOT EXISTS (
                        SELECT 1 FROM dxv_term_relationships tr
                        JOIN dxv_term_taxonomy tt ON tr.term_taxonomy_id = tt.term_taxonomy_id
                        WHERE tr.object_id = u.ID AND tt.taxonomy = 'bp_member_type'
                    )
                ");
            })
            ->when($this->search, function ($query) {
                $query->where(function ($q) {
                    $q->where('fn.value', 'LIKE', "%{$this->search}%")
                      ->orWhere('ln.value', 'LIKE', "%{$this->search}%");
                });
            })
            ->distinct()
            ->orderBy('u.ID', 'desc')
            ->paginate(10);

        return view('livewire.vacio', compact('users'));
    }
}
