<?php

namespace App\Livewire\Admin\Asilos;

use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class Asilos extends Component
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
            ->select(
                'dxv_users.ID',
                'dxv_users.user_login',
                DB::raw('(SELECT value FROM dxv_bp_xprofile_data WHERE user_id = dxv_users.ID AND field_id = 1 LIMIT 1) AS first_name'),
                DB::raw('(SELECT value FROM dxv_bp_xprofile_data WHERE user_id = dxv_users.ID AND field_id = 2 LIMIT 1) AS last_name'),
                DB::raw('(SELECT value FROM dxv_bp_xprofile_data WHERE user_id = dxv_users.ID AND field_id = 50 LIMIT 1) AS job_title')
            )
            
            ->when(!empty($this->search), function ($query) {
                $query->where(function ($query) {
                    $query->whereRaw('(SELECT value FROM dxv_bp_xprofile_data WHERE user_id = dxv_users.ID AND field_id = 1 LIMIT 1) LIKE ?', ["%{$this->search}%"])
                          ->orWhereRaw('(SELECT value FROM dxv_bp_xprofile_data WHERE user_id = dxv_users.ID AND field_id = 2 LIMIT 1) LIKE ?', ["%{$this->search}%"]);
                });
            })
            ->having('job_title', 'LIKE', '%Asilos%')
            // ->orderBy('ID', 'desc')
            ->paginate(10);
        return view('livewire.admin.asilos.asilos', compact('users'));
    }
}
