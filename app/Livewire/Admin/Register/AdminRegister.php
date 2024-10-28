<?php

namespace App\Livewire\Admin\Register;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AdminRegister extends Component
{
    public $name;
    public $email;
    public $password;
    public $password_confirmation;

    protected $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8|confirmed',
    ];

    public function register()
    {
        $this->validate();

        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);
        $this->reset();
        session()->flash('message', 'Registro exitoso.');

        // Redirige o realiza otra acción después del registro
    }

    public function render()
    {
        return view('livewire.admin.register.admin-register');
    }
}
