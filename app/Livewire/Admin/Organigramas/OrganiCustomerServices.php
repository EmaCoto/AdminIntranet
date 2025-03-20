<?php

namespace App\Livewire\Admin\Organigramas;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class OrganiCustomerServices extends Component
{
    protected $listeners = ['render'];
    

    public function render()
    {
        // Orden jerárquico basado en el tipo de perfil (desde la tabla dxv_terms)
        $profileOrder = [];

        $users = DB::connection('wordpress')
            ->table('dxv_users')
            ->select([
                'dxv_users.ID',
                'dxv_users.user_login',
                'fn.value as first_name',
                'ln.value as last_name',
                'jt.value as job_title',
                't.name as profile_type' // Tipo de perfil desde la tabla dxv_terms
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
                $join->on('tt.term_id', '=', 't.term_id'); // Obteniendo el tipo de perfil desde dxv_terms
            })
            ->whereRaw("(SELECT value FROM dxv_bp_xprofile_data WHERE user_id = dxv_users.ID AND field_id = 50 LIMIT 1) IN ('Customer Services')")
            ->get()
            ->sortBy(function ($user) use ($profileOrder) {
                return $profileOrder[$user->profile_type] ?? PHP_INT_MAX; // Ordenar según el tipo de perfil, los no listados al final
            })
            ->groupBy('profile_type'); // Agrupar por tipo de perfil.

        $profileTypes = array_keys($profileOrder); // Extraer los tipos de perfil en el orden definido.
        return view('livewire.admin.organigramas.organi-customer-services', compact('users', 'profileTypes'));
    }
}
