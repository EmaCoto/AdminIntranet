<?php

namespace App\Livewire\Admin\User;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class Grafico extends Component
{
    public $totalEmployees;
    public $newEmployees;
    public $totalDepartments;
    public $totalField53;
    public $jobTitleChanges;
    public $gerenciaCount;
    public $coordinadorCount;
    public $supervisorCount;
    public $directorCount;
    public $vendedorCount;
    public $colombia, $estadosUnidos, $argentina, $mexico, $puertoRico, $costaRica;
    public $departments = [];
    public $ubicacion = [];
    public $area = [];

    public function mount()
    {
        // Total de empleados
        $this->totalEmployees = DB::connection('wordpress')
            ->table('dxv_users')
            ->leftJoin('dxv_bp_xprofile_data as jt', function ($join) {
                $join->on('dxv_users.ID', '=', 'jt.user_id')
                    ->where('jt.field_id', '=', 50);
            })
            ->where(function ($query) {
                $query->whereNull('jt.value')
                    ->orWhere('jt.value', '!=', 'USUARIO DEPURADO');
            })
            ->count();
            
        // Empleados nuevos (últimos 30 días)
        $this->newEmployees = DB::connection('wordpress')
            ->table('dxv_users')
            ->leftJoin('dxv_bp_xprofile_data as jt', function ($join) {
                $join->on('dxv_users.ID', '=', 'jt.user_id')
                    ->where('jt.field_id', '=', 50);
            })
            ->where('dxv_users.user_registered', '>=', now()->subDays(30))
            ->where(function ($query) {
                $query->whereNull('jt.value')
                    ->orWhere('jt.value', '!=', 'USUARIO DEPURADO');
            })
            ->count();

        // Contar perfiles específicos
        $this->gerenciaCount = $this->countProfiles('%subgerente%');
        $this->coordinadorCount = $this->countProfiles('%coordinador%');
        $this->supervisorCount = $this->countProfiles('%supervisor%');
        $this->directorCount = $this->countProfiles('%director%');
        $this->vendedorCount = $this->countProfiles('%vendedor%');

        // Contar usuarios por país
        $this->colombia = $this->countCountry('Colombia');
        $this->estadosUnidos = $this->countCountry('Estados Unidos');
        $this->argentina = $this->countCountry('Argentina');
        $this->mexico = $this->countCountry('México');
        $this->puertoRico = $this->countCountry('Puerto Rico');
        $this->costaRica = $this->countCountry('Costa Rica');

        // Contar todos los departamentos excluyendo "USUARIOS DEPURADOS" y "Otro"
        $this->departments = DB::connection('wordpress')
            ->table('dxv_bp_xprofile_data')
            ->where('field_id', 50)
            ->whereNotIn('value', ['USUARIO DEPURADO', 'Otro', ''])
            ->select('value', DB::raw('COUNT(*) as total'))
            ->groupBy('value')
            ->orderBy('value', 'asc')
            ->get()
            ->pluck('total', 'value')
            ->toArray();

        // Contar todos los valores del campo 53 excluyendo "USUARIOS DEPURADOS" y "Otro"
        $this->ubicacion = DB::connection('wordpress')
            ->table('dxv_bp_xprofile_data')
            ->where('field_id', 53)
            ->whereNotIn('value', ['USUARIO DEPURADO','Otro', ''])
            ->select('value', DB::raw('COUNT(DISTINCT user_id) as total'))
            ->groupBy('value')
            ->orderBy('value', 'asc')
            ->get()
            ->pluck('total', 'value')
            ->toArray();

        // Contar todos los valores del campo 760 excluyendo "USUARIOS DEPURADOS" y "Otro"
        $this->area = DB::connection('wordpress')
            ->table('dxv_bp_xprofile_data')
            ->where('field_id', 760)
            ->whereNotIn('value', ['USUARIO DEPURADO', 'Otro', ''])
            ->select('value', DB::raw('COUNT(DISTINCT user_id) as total'))
            ->groupBy('value')
            ->orderBy('value', 'asc')
            ->get()
            ->pluck('total', 'value')
            ->toArray();
    }

    private function countProfiles($role)
    {
        return DB::connection('wordpress')
            ->table('dxv_users')
            ->leftJoin('dxv_term_relationships as tr', 'dxv_users.ID', '=', 'tr.object_id')
            ->leftJoin('dxv_term_taxonomy as tt', function ($join) {
                $join->on('tr.term_taxonomy_id', '=', 'tt.term_taxonomy_id')
                     ->where('tt.taxonomy', 'bp_member_type');
            })
            ->leftJoin('dxv_terms as t', 'tt.term_id', '=', 't.term_id')
            ->where('t.name', 'LIKE', $role)
            ->count();
    }

    public function countCountry($country)
    {
        return DB::connection('wordpress')
            ->table('dxv_bp_xprofile_data')
            ->where('field_id', 288)
            ->where('value', 'LIKE', "%{$country}%")
            ->count();
    }

    public function render()
    {
        return view('livewire.admin.user.grafico', [
            'departments' => $this->departments,
            'ubicacion' => $this->ubicacion,
        ]);
    }
}
