<?php

namespace App\Livewire\Admin\User;

use App\Models\UsersIntranet;
use App\Models\UsersIntranetExtendido;
use Livewire\Component;


class EditUser extends Component
{
    public $open = false;
    public $userId, $user;
    public $nombre, $apellido, $etiqueta, $usuario, $ubicacion, $numero, $correo, $date, $cloud;
    public $etiquetaOptions = [];
    public $ubicacionOptions = [];

    public function mount($userId)
    {
        // Cargar datos del usuario
        $this->user = UsersIntranet::with('profileData')->find($userId);

        // Asignar los valores de los campos personalizados si existen
        $this->nombre = optional($this->user->profileData->where('field_id', 1)->first())->value;
        $this->apellido = optional($this->user->profileData->where('field_id', 2)->first())->value;
        $this->usuario = optional($this->user->profileData->where('field_id', 3)->first())->value;
        $this->etiqueta = optional($this->user->profileData->where('field_id', 50)->first())->value;
        $this->ubicacion = optional($this->user->profileData->where('field_id', 53)->first())->value;
        $this->cloud = optional($this->user->profileData->where('field_id', 77)->first())->value;
        $this->numero = optional($this->user->profileData->where('field_id', 76)->first())->value;
        $this->correo = optional($this->user->profileData->where('field_id', 78)->first())->value;
        $this->date = optional($this->user->profileData->where('field_id', 212)->first())->value;



        // Aquí defines las opciones que se mostrarán en el select
        $this->etiquetaOptions = [
            'IT Sistemas' => 'IT Sistemas',
            'Legal USCIS' => 'Legal USCIS',
            'Publicidad' => 'Publicidad',
        ];

        $this->ubicacionOptions = [
            'Cúcuta' => 'Cúcuta',
            'Barranquilla' => 'Barranquilla',
            'Bogotá' => 'Bogotá',
            'Pereira' => 'Pereira',
            'Medellín' => 'Medellín',
            'Florencia' => 'Florencia',
            'Yopal' => 'Yopal',
            'Pasto' => 'Pasto',
            'San Andrés' => 'San Andrés',
            'Gainesville' => 'Gainesville',
            'Tampa' => 'Tampa',
            'Kissimmee' => 'Kissimmee',
            'Orlando' => 'Orlando',
            'Houston' => 'Houston',
            'Renton' => 'Renton',
            'Argentina' => 'Argentina',
            'México' => 'México',
            'Puerto Rico' => 'Puerto Rico',
            'Costa Rica' => 'Costa Rica',
        ];
    }

    public function updateUser()
    {
        // Validación de los campos
        $this->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:20',
            'usuario' => 'required|string|max:50',
            'etiqueta' => 'required',
            'ubicacion' => 'required',
            'numero' => 'required',
            'correo' => 'required',
            'date' => 'required',
        ]);

        // Actualizar los campos personalizados
        UsersIntranetExtendido::updateOrCreate(
            ['user_id' => $this->userId, 'field_id' => 1],
            ['value' => $this->nombre]
        );

        UsersIntranetExtendido::updateOrCreate(
            ['user_id' => $this->userId, 'field_id' => 2],
            ['value' => $this->apellido]
        );

        UsersIntranetExtendido::updateOrCreate(
            ['user_id' => $this->userId, 'field_id' => 3],
            ['value' => $this->usuario]
        );

        UsersIntranetExtendido::updateOrCreate(
            ['user_id' => $this->userId, 'field_id' => 50],
            ['value' => $this->etiqueta]
        );

        UsersIntranetExtendido::updateOrCreate(
            ['user_id' => $this->userId, 'field_id' => 53],
            ['value' => $this->ubicacion]
        );

        UsersIntranetExtendido::updateOrCreate(
            ['user_id' => $this->userId, 'field_id' => 77],
            ['value' => $this->cloud]
        );

        UsersIntranetExtendido::updateOrCreate(
            ['user_id' => $this->userId, 'field_id' => 76],
            ['value' => $this->numero]
        );

        UsersIntranetExtendido::updateOrCreate(
            ['user_id' => $this->userId, 'field_id' => 78],
            ['value' => $this->correo]
        );

        UsersIntranetExtendido::updateOrCreate(
            ['user_id' => $this->userId, 'field_id' => 212],
            ['value' => $this->date]
        );

        // Redireccionar o emitir un evento de éxito
        session()->flash('message', 'Usuario actualizado correctamente.');
        $this->dispatch('render');
    }

    public function render()
    {
        return view('livewire.admin.user.edit-user', [
            'etiquetaOptions' => $this->etiquetaOptions, // Pasar las opciones a la vista
        ]);
    }
}


