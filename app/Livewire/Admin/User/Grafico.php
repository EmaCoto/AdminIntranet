<?php

namespace App\Livewire\Admin\User;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class Grafico extends Component
{
    public $totalEmployees;
    public $newEmployees;
    public $retiredEmployees;
    public $totalDepartments;
    public $jobTitleChanges;

    public function mount()
    {
        // Total de empleados
        $this->totalEmployees = DB::connection('wordpress')->table('dxv_users')->count();

        // Empleados nuevos (últimos 30 días, usando el campo user_registered)
        $this->newEmployees = DB::connection('wordpress')
            ->table('dxv_users')
            ->where('user_registered', '>=', now()->subDays(30))
            ->count();

        // Empleados retirados (depende de cómo manejes los "retiros")
        // $this->retiredEmployees = DB::connection('wordpress')
        // ->table('dxv_usermeta')
        // ->where('meta_key', 'status')
        // ->where('meta_value', 'retired')
        // ->count();

        // Departamentos únicos
        $this->totalDepartments = DB::connection('wordpress')
            ->table('dxv_bp_xprofile_data')
            ->where('field_id', 50)
            ->distinct('value')
            ->count('value');
    }

    public function render()
    {
        return view('livewire.admin.user.grafico');
    }
}
