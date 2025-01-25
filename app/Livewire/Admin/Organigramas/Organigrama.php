<?php

namespace App\Livewire\Admin\Organigramas;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Organigrama extends Component
{
    protected $listeners = ['render'];

    public function render()
    {
        // Ordenar los usuarios según el campo `job_title`
        $jobOrder = [
            'Publicidad' => 1,
            'Legal USCIS' => 2,
            'Servi Huellas' => 3,
        ];

        $users = DB::connection('wordpress')
            ->table('dxv_users')
            ->select(
                'dxv_users.ID',
                'dxv_users.user_login',
                DB::raw('(SELECT value FROM dxv_bp_xprofile_data WHERE user_id = dxv_users.ID AND field_id = 1 LIMIT 1) AS first_name'),
                DB::raw('(SELECT value FROM dxv_bp_xprofile_data WHERE user_id = dxv_users.ID AND field_id = 2 LIMIT 1) AS last_name'),
                DB::raw('(SELECT value FROM dxv_bp_xprofile_data WHERE user_id = dxv_users.ID AND field_id = 50 LIMIT 1) AS job_title')
            )
            ->get()
            ->sortBy(function ($user) use ($jobOrder) {
                return $jobOrder[$user->job_title] ?? PHP_INT_MAX; // Ordenar según `job_title`, los no listados al final.
            })
            ->groupBy('job_title'); // Agrupar por `job_title`.

        return view('livewire.admin.organigramas.organigrama', compact('users'));
    }
}
