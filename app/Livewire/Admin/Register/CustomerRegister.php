<?php

namespace App\Livewire\Admin\Register;

use App\Models\UsersIntranet;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;


class CustomerRegister extends Component
{
    public $user_login;
    public $user_pass;
    public $user_nicename;
    public $user_email;
    public $user_url;
    public $user_registered;
    public $user_activation_key = '';
    public $user_status = 0;
    public $display_name;

    // Definir las reglas de validación
    protected $rules = [
        'user_login' => 'required|string|max:60|unique:dxv_users,user_login',
        'user_pass' => 'required|string|min:8',
        'user_nicename' => 'required|string|max:50',
        'user_email' => 'required|email|max:100|unique:dxv_users,user_email',
        'user_url' => 'nullable|url|max:100',
        'display_name' => 'required|string|max:250',
    ];

    // Método para crear el usuario
    public function createUser()
    {
        // Validar los datos
        $this->validate();

        // Crear el usuario
        UsersIntranet::create([
            'user_login' => $this->user_login,
            'user_pass' => Hash::make($this->user_pass), // Hashear la contraseña
            'user_nicename' => $this->user_nicename,
            'user_email' => $this->user_email,
            'user_url' => $this->user_url,
            'user_registered' => now(),
            'user_activation_key' => $this->user_activation_key,
            'user_status' => $this->user_status,
            'display_name' => $this->display_name,
        ]);

        // Reiniciar los campos y mostrar un mensaje de éxito
        $this->reset();
        session()->flash('message', 'Usuario creado exitosamente.');
    }

    public function render()
    {
        return view('livewire.admin.register.customer-register');
    }
}
