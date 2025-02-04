<?php

namespace App\Livewire\Admin\Departamentos;

use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class Sistemas extends Component
{
    use WithPagination;

    public $search = '';
    protected $listeners = ['render'];

    public function resetSearch()
    {
        $this->reset('search');
    }

    public function deleteUser($ID)
    {
        DB::transaction(function () use ($ID) {
            $tables = [
                'dxv_usermeta', 'dxv_bp_xprofile_data', 'dxv_bp_friends',
                'dxv_bp_messages_messages', 'dxv_bp_messages_recipients',
                'dxv_bp_notifications', 'dxv_bp_activity', 'dxv_bp_groups_members'
            ];

            foreach ($tables as $table) {
                DB::connection('wordpress')->table($table)->where('user_id', $ID)->delete();
            }

            DB::connection('wordpress')->table('dxv_users')->where('ID', $ID)->delete();
        });

        session()->flash('messageDelete', 'Usuario eliminado correctamente');
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
                            ->orWhere('ln.value', 'LIKE', "%{$this->search}%");
                });
            })
            ->having('job_title', 'LIKE', 'Sistemas')
            // ->orderBy('ID', 'desc')
            ->paginate(10);
    
        return view('livewire.admin.departamentos.sistemas', compact('users'));
    }
}
