<?php

namespace App\Livewire\Admin\User;

use Illuminate\Support\Facades\DB;
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
        $this->userId = $userId;

        // Cargar datos del usuario de forma directa sin el modelo
        $this->user = DB::connection('wordpress')->table('dxv_users')->where('ID', $this->userId)->first();
        $profileData = DB::connection('wordpress')->table('dxv_bp_xprofile_data')->where('user_id', $this->userId)->get();

        $this->nombre = optional($profileData->where('field_id', 1)->first())->value;
        $this->apellido = optional($profileData->where('field_id', 2)->first())->value;
        $this->usuario = optional($profileData->where('field_id', 3)->first())->value;
        $this->etiqueta = optional($profileData->where('field_id', 50)->first())->value;
        $this->ubicacion = optional($profileData->where('field_id', 53)->first())->value;
        $this->cloud = optional($profileData->where('field_id', 77)->first())->value;
        $this->numero = optional($profileData->where('field_id', 76)->first())->value;
        $this->correo = optional($profileData->where('field_id', 78)->first())->value;
        $this->date = optional($profileData->where('field_id', 212)->first())->value;

        // Opciones de select
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
        $this->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:20',
            'usuario' => 'required|string|max:50',
            'etiqueta' => 'required',
            'ubicacion' => 'required',
            'cloud' => 'required',
            'numero' => 'required',
            'correo' => 'required',
            'date' => 'required',
        ]);

        // Actualizar campos en `dxv_bp_xprofile_data` de forma directa
        $fields = [
            1 => $this->nombre,
            2 => $this->apellido,
            3 => $this->usuario,
            50 => $this->etiqueta,
            53 => $this->ubicacion,
            77 => $this->cloud,
            76 => $this->numero,
            78 => $this->correo,
            212 => $this->date,
        ];

        foreach ($fields as $field_id => $value) {
            DB::connection('wordpress')->table('dxv_bp_xprofile_data')->updateOrInsert(
                ['user_id' => $this->userId, 'field_id' => $field_id],
                [
                    'value' => $value,
                    'last_updated' => now(), // Asigna la fecha y hora actual
                ]
            );
        }
        session()->flash('message', 'Usuario actualizado correctamente.');
        $this->reset('open');
        $this->dispatch('render');
    }

    public function render()
    {
        return view('livewire.admin.user.edit-user', [
            'etiquetaOptions' => $this->etiquetaOptions, 'ubicacionOptions' => $this->ubicacionOptions
        ]);
    }
}
