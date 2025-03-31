<?php

namespace App\Livewire\Admin\Register;

use App\Models\UsersIntranet;
use App\Models\UsersIntranetMeta;
use App\Models\UsersIntranetExtendido;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class CustomerRegister extends Component
{
    public $user_login, $user_pass, $user_email, $first_name, $last_name;
    protected $listeners = ['setPassword'];

    protected $rules = [
        'user_login' => 'required|string|max:60|unique:wordpress.dxv_users,user_login',
        'user_pass' => 'required|string|min:8',
        'user_email' => 'required|email|max:100|unique:wordpress.dxv_users,user_email',
        'first_name' => 'required|string|max:100',
        'last_name' => 'required|string|max:100',
    ];

    public function mount()
    {
        $this->user_pass = '';
    }

    public function setPassword($password)
    {
        $this->user_pass = $password;
    }

    public function createUser()
    {
        $this->validate();

        $hashed_password = md5($this->user_pass);

        DB::connection('wordpress')->beginTransaction();

        try {
            $user = UsersIntranet::create([
                'user_login' => $this->user_login,
                'user_pass' => $hashed_password,
                'user_nicename' => $this->user_login,
                'user_email' => $this->user_email,
                'user_url' => '',
                'user_registered' => now(),
                'user_activation_key' => '',
                'user_status' => 0,
                'display_name' => $this->first_name . ' ' . $this->last_name,
            ]);

            $this->createUserMeta($user->ID, 'nickname', $this->user_login);
            $this->createUserMeta($user->ID, 'first_name', $this->first_name);
            $this->createUserMeta($user->ID, 'last_name', $this->last_name);
            $this->createUserMeta($user->ID, 'dxv_capabilities', serialize(['subscriber' => true]));
            $this->createUserMeta($user->ID, 'dxv_user_level', 0);

            $this->createBuddyBossProfile($user->ID, 1, $this->first_name);
            $this->createBuddyBossProfile($user->ID, 2, $this->last_name);

            $this->createBuddyBossActivity($user->ID);

            DB::connection('wordpress')->commit();

            session()->flash('message', 'Colaborador creado exitosamente, recuerda completar los datos del perfil.');
            $this->reset();
        } catch (\Exception $e) {
            DB::connection('wordpress')->rollBack();
            session()->flash('error', 'Error al crear usuario: ' . $e->getMessage());
        }
    }

    private function createUserMeta($user_id, $key, $value)
    {
        if (!empty($value)) {
            UsersIntranetMeta::create([
                'user_id' => $user_id,
                'meta_key' => $key,
                'meta_value' => $value,
            ]);
        }
    }

    private function createBuddyBossProfile($user_id, $field_id, $value)
    {
        UsersIntranetExtendido::create([
            'field_id' => $field_id,
            'user_id' => $user_id,
            'value' => $value,
            'last_updated' => now(),
        ]);
    }

    private function createBuddyBossActivity($user_id)
    {
        DB::connection('wordpress')->table('dxv_bp_activity')->insert([
            'user_id' => $user_id,
            'component' => 'members',
            'type' => 'new_member',
            'action' => '¡' . $this->first_name . ' se ha unido a la comunidad!',
            'content' => '',
            'primary_link' => '',
            'item_id' => 0,
            'secondary_item_id' => null,
            'date_recorded' => now(),
            'hide_sitewide' => 0,
            'mptt_left' => 0,
            'mptt_right' => 0,
            'is_spam' => 0,
            'privacy' => 'public',
            'status' => 'published',
        ]);
    }

    public function render()
    {
        return view('livewire.admin.register.customer-register');
    }
}
