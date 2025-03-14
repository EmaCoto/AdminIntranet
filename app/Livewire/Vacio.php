<?php

namespace App\Livewire;

use Illuminate\Support\Facades\DB;
use App\Exports\ColaboradoresVaciosExport;
use Livewire\Component;
use Livewire\WithPagination;

class Vacio extends Component
{
    use WithPagination;

    public $search = '';
    protected $listeners = ['render'];

    public function exportVacio()
    {
        $export = new ColaboradoresVaciosExport();
        return $export->export();
    }

    public function resetSearch()
    {
        $this->reset('search');
        $this->resetPage();
    }
    
    public function updatingSearch()
    {
        $this->resetPage();
    }
       
    public function deleteUser($ID)
    {
        DB::connection('wordpress')->table('dxv_bp_xprofile_data')
            ->updateOrInsert(
                ['user_id' => $ID, 'field_id' => 50], 
                ['value' => 'USUARIO DEPURADO', 'last_updated' => now()]
            );
    
        $this->dispatch('render');
    }    

    public function render()
    {
        // Lista de campos requeridos
        $fieldsToCheck = [1, 2, 3, 999, 1000, 78, 302, 76, 288, 53, 760, 50, 212, 324, 325];

        $usersWithMissingFields = DB::connection('wordpress')
            ->table('dxv_users as u')
            ->select([
                'u.ID',
                'u.user_login',
                'fn.value as first_name',
                'ln.value as last_name',
                'jt.value as job_title',
                't.name as cargo'
            ])
            ->leftJoin('dxv_bp_xprofile_data as fn', function ($join) {
                $join->on('u.ID', '=', 'fn.user_id')->where('fn.field_id', '=', 1);
            })
            ->leftJoin('dxv_bp_xprofile_data as ln', function ($join) {
                $join->on('u.ID', '=', 'ln.user_id')->where('ln.field_id', '=', 2);
            })
            ->leftJoin('dxv_bp_xprofile_data as jt', function ($join) {
                $join->on('u.ID', '=', 'jt.user_id')->where('jt.field_id', '=', 50);
            })
            ->leftJoin('dxv_term_relationships as tr', function ($join) {
                $join->on('u.ID', '=', 'tr.object_id');
            })
            ->leftJoin('dxv_term_taxonomy as tt', function ($join) {
                $join->on('tr.term_taxonomy_id', '=', 'tt.term_taxonomy_id')->where('tt.taxonomy', 'bp_member_type');
            })
            ->leftJoin('dxv_terms as t', function ($join) {
                $join->on('tt.term_id', '=', 't.term_id');
            })
            ->whereIn('u.ID', function ($subQuery) use ($fieldsToCheck) {
                $subQuery->select('user_id')
                    ->from('dxv_bp_xprofile_data')
                    ->whereIn('field_id', $fieldsToCheck)
                    ->groupBy('user_id')
                    ->havingRaw('SUM(CASE WHEN value IS NULL OR value = "" THEN 1 ELSE 0 END) > 0');
            })
            ->when($this->search, function ($query) {
                $query->where(function ($subQuery) {
                    $subQuery->where('fn.value', 'LIKE', "%{$this->search}%")
                            ->orWhere('ln.value', 'LIKE', "%{$this->search}%")
                            ->orWhere('jt.value', 'LIKE', "%{$this->search}%");
                });
            })
            ->orderBy('u.ID', 'desc')
            ->paginate(10);

        return view('livewire.vacio', compact('usersWithMissingFields'))->with('users', $usersWithMissingFields);
    }
}
