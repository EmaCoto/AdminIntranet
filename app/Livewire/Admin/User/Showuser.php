<?php

namespace App\Livewire\Admin\User;

use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class Showuser extends Component
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
            DB::connection('wordpress')->table('dxv_usermeta')->where('user_id', $ID)->delete();
            DB::connection('wordpress')->table('dxv_bp_xprofile_data')->where('user_id', $ID)->delete();
            DB::connection('wordpress')->table('dxv_bp_friends')->where('initiator_user_id', $ID)->orWhere('friend_user_id', $ID)->delete();
            DB::connection('wordpress')->table('dxv_bp_messages_messages')->where('sender_id', $ID)->delete();
            DB::connection('wordpress')->table('dxv_bp_messages_recipients')->where('user_id', $ID)->delete();
            DB::connection('wordpress')->table('dxv_bp_notifications')->where('user_id', $ID)->delete();
            DB::connection('wordpress')->table('dxv_bp_activity')->where('user_id', $ID)->delete();
            DB::connection('wordpress')->table('dxv_bp_groups_members')->where('user_id', $ID)->delete();
            DB::connection('wordpress')->table('dxv_users')->where('ID', $ID)->delete();
        });
        session()->flash('message', 'Usuario eliminado correctamente');
    }

    
    public function render()
    {
        $users = DB::connection('wordpress')
            ->table('dxv_users')
            ->leftJoin('dxv_bp_xprofile_data as profile_data_1', function ($join) {
                $join->on('dxv_users.ID', '=', 'profile_data_1.user_id')
                    ->where('profile_data_1.field_id', 1);
            })
            ->leftJoin('dxv_bp_xprofile_data as profile_data_2', function ($join) {
                $join->on('dxv_users.ID', '=', 'profile_data_2.user_id')
                    ->where('profile_data_2.field_id', 2);
            })
            ->leftJoin('dxv_bp_xprofile_data as profile_data_50', function ($join) {
                $join->on('dxv_users.ID', '=', 'profile_data_50.user_id')
                    ->where('profile_data_50.field_id', 50);
            })
            ->select(
                'dxv_users.ID',
                'dxv_users.user_login',
                'profile_data_1.value as first_name',
                'profile_data_2.value as last_name',
                'profile_data_50.value as job_title'
            )
            ->when(!empty($this->search), function ($query) {
                $query->where(function ($query) {
                    $query->where('profile_data_1.value', 'like', "%{$this->search}%")
                          ->orWhere('profile_data_2.value', 'like', "%{$this->search}%");
                });
            })
            // ->orderBy('ID', 'desc')
            ->paginate(30);

        return view('livewire.admin.user.showuser', compact('users'));
    }
}
