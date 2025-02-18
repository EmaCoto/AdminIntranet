<?php

namespace App\Livewire\Admin\User;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class Grafico extends Component
{
    public $totalEmployees;
    public $newEmployees;
    public $totalDepartments;
    public $jobTitleChanges;
    public $gerenciaCount;
    public $coordinadorCount;
    public $supervisorCount;
    public $directorCount;
    public $vendedorCount;

    public function mount()
    {
        // Total de empleados
        $this->totalEmployees = DB::connection('wordpress')->table('dxv_users')->count();

        // Empleados nuevos (últimos 30 días)
        $this->newEmployees = DB::connection('wordpress')
            ->table('dxv_users')
            ->where('user_registered', '>=', now()->subDays(30))
            ->count();

        // Departamentos únicos
        $this->totalDepartments = DB::connection('wordpress')
            ->table('dxv_bp_xprofile_data')
            ->where('field_id', 50)
            ->distinct('value')
            ->count('value');

        // Contar perfiles que contienen "gerencia"
        $this->gerenciaCount = DB::connection('wordpress')
            ->table('dxv_users')
            ->leftJoin('dxv_term_relationships as tr', 'dxv_users.ID', '=', 'tr.object_id')
            ->leftJoin('dxv_term_taxonomy as tt', function ($join) {
                $join->on('tr.term_taxonomy_id', '=', 'tt.term_taxonomy_id')
                     ->where('tt.taxonomy', 'bp_member_type');
            })
            ->leftJoin('dxv_terms as t', 'tt.term_id', '=', 't.term_id')
            ->where('t.name', 'LIKE', '%subgerente%')
            ->count();

        // Contar perfiles que contienen "coordinador"
        $this->coordinadorCount = DB::connection('wordpress')
            ->table('dxv_users')
            ->leftJoin('dxv_term_relationships as tr', 'dxv_users.ID', '=', 'tr.object_id')
            ->leftJoin('dxv_term_taxonomy as tt', function ($join) {
                $join->on('tr.term_taxonomy_id', '=', 'tt.term_taxonomy_id')
                     ->where('tt.taxonomy', 'bp_member_type');
            })
            ->leftJoin('dxv_terms as t', 'tt.term_id', '=', 't.term_id')
            ->where('t.name', 'LIKE', '%coordinador%')
            ->count();

        // Contar perfiles que contienen "Supervisores"
        $this->supervisorCount = DB::connection('wordpress')
            ->table('dxv_users')
            ->leftJoin('dxv_term_relationships as tr', 'dxv_users.ID', '=', 'tr.object_id')
            ->leftJoin('dxv_term_taxonomy as tt', function ($join) {
                $join->on('tr.term_taxonomy_id', '=', 'tt.term_taxonomy_id')
                     ->where('tt.taxonomy', 'bp_member_type');
            })
            ->leftJoin('dxv_terms as t', 'tt.term_id', '=', 't.term_id')
            ->where('t.name', 'LIKE', '%supervisor%')
            ->count();

        // Contar perfiles que contienen "Director"
        $this->directorCount = DB::connection('wordpress')
            ->table('dxv_users')
            ->leftJoin('dxv_term_relationships as tr', 'dxv_users.ID', '=', 'tr.object_id')
            ->leftJoin('dxv_term_taxonomy as tt', function ($join) {
                $join->on('tr.term_taxonomy_id', '=', 'tt.term_taxonomy_id')
                     ->where('tt.taxonomy', 'bp_member_type');
            })
            ->leftJoin('dxv_terms as t', 'tt.term_id', '=', 't.term_id')
            ->where('t.name', 'LIKE', '%director%')
            ->count();

        // Contar perfiles que contienen "Director"
        $this->vendedorCount = DB::connection('wordpress')
            ->table('dxv_users')
            ->leftJoin('dxv_term_relationships as tr', 'dxv_users.ID', '=', 'tr.object_id')
            ->leftJoin('dxv_term_taxonomy as tt', function ($join) {
                $join->on('tr.term_taxonomy_id', '=', 'tt.term_taxonomy_id')
                    ->where('tt.taxonomy', 'bp_member_type');
            })
            ->leftJoin('dxv_terms as t', 'tt.term_id', '=', 't.term_id')
            ->where('t.name', 'LIKE', '%vendedor%')
            ->count();
    }

    public function render()
    {
        return view('livewire.admin.user.grafico');
    }
}
