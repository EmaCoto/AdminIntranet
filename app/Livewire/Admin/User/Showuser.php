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
            ->leftJoin('dxv_bp_xprofile_data as fn', function ($join) {
                $join->on('fn.user_id', '=', 'dxv_users.ID')->where('fn.field_id', 1);
            })
            ->leftJoin('dxv_bp_xprofile_data as ln', function ($join) {
                $join->on('ln.user_id', '=', 'dxv_users.ID')->where('ln.field_id', 2);
            })
            ->leftJoin('dxv_bp_xprofile_data as jt', function ($join) {
                $join->on('jt.user_id', '=', 'dxv_users.ID')->where('jt.field_id', 50);
            })
            ->select(
                'dxv_users.ID',
                'dxv_users.user_login',
                'fn.value as first_name',
                'ln.value as last_name',
                'jt.value as job_title'
            )
            ->when($this->search, function ($query) {
                $query->where(function ($subQuery) {
                    $subQuery->where('fn.value', 'LIKE', "%{$this->search}%")
                             ->orWhere('ln.value', 'LIKE', "%{$this->search}%");
                });
            })
            ->paginate(10);

        return view('livewire.admin.user.showuser', compact('users'));
    }
}
