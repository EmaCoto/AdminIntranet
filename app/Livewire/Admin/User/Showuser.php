<?php

namespace App\Livewire\Admin\User;

use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\Attributes\On;

class Showuser extends Component
{
    public $users;

    #[On('render')]
    public function mount()
    {
        $this->users = DB::connection('wordpress')
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
            ->limit(12)
            ->get();
    }

    #[On('message')]
    public function message(){
        session()->flash('message', 'Usuario actualizado correctamente.');
    }

    public function deleteUser($ID)
    {
        DB::transaction(function () use ($ID) {
            // Eliminar datos en tablas de BuddyBoss utilizando la conexión a la base de datos de WordPress
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


    }


    public function render()
    {
        return view('livewire.admin.user.showuser', ['users' => $this->users]);
    }
}
