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
    protected $listeners = ['setPassword'];


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
            'email' => 'required|string|email|max:255|unique:users|ends_with:@rpsprocessing.com,@rpsprocessing.es',
            'password' => 'required|string|min:8|confirmed',
        ]);

        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);
        $this->reset();
        session()->flash('message', 'Registro exitoso.');
    }

    public function updatedEmail()
    {
        $this->resetErrorBag('email'); // Resetea solo el error de email
    }

    public function render()
    {
        return view('livewire.admin.register.admin-register');
    }
}
