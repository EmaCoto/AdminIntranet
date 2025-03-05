<?php

namespace App\Livewire\Admin\Register;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminRegister extends Component
{
    public $name;
    public $email;
    public $password;
    public $password_confirmation;
    protected $listeners = ['setPassword', 'render'];


    // protected $rules = [
    //     'name' => 'required|string|max:255',
    //     'email' => 'required|string|email|max:255|unique:users',
    //     'password' => 'required|string|min:8|confirmed',
    // ];

    public function mount()
    {
        $this->password = '';
        $this->password_confirmation = '';
    }

    public function setPassword($password)
    {
        $this->password = $password;
        $this->password_confirmation = $password;
    }    

    public function register()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                'unique:users',
                'regex:/^[a-zA-Z0-9._%+-]+@outlook\.(com|es)$/i'
            ],
            'password' => 'required|string|min:8|confirmed',
        ]);

        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);
        $this->reset();
        $this->dispatch('render');
        session()->flash('message', 'Registro exitoso.');
    }

    public function messages()
    {
        return [
            'email.regex' => 'El correo debe ser una dirección de Outlook válida (ejemplo@outlook.com o ejemplo@outlook.es).',
        ];
    }


    public function render()
    {
        return view('livewire.admin.register.admin-register');
    }
}
