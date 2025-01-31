<?php

namespace App\Livewire\Admin\User;

use Illuminate\Support\Facades\DB;
use App\Models\Notification;
use Livewire\Component;

class EditUser extends Component
{
    public $open = false;
    public $userId, $user;
    public $nombre, $apellido, $etiqueta, $usuario, $ubicacion, $numero, $correo, $personalCorreo, $cloud, $pais, $modalidad, $perfil, $outlook, $whatsAppCorporativo, $area;
    public $etiquetaOptions = [];
    public $ubicacionOptions = [];
    public $paisOptions = [];
    public $modalidadOptions = [];
    public $areaOptions = []; 
    public $perfilOptions = [];

    public function mount($userId)
    {
        $this->userId = $userId;

        // Cargar datos del usuario
        $this->user = DB::connection('wordpress')->table('dxv_users')->where('ID', $this->userId)->first();
        $profileData = DB::connection('wordpress')->table('dxv_bp_xprofile_data')->where('user_id', $this->userId)->get();

        $this->nombre = optional($profileData->where('field_id', 1)->first())->value;
        $this->apellido = optional($profileData->where('field_id', 2)->first())->value;
        $this->usuario = optional($profileData->where('field_id', 3)->first())->value;
        $this->outlook  = optional($profileData->where('field_id', 558)->first())->value;
        $this->correo = optional($profileData->where('field_id', 78)->first())->value;
        $this->personalCorreo = optional($profileData->where('field_id', 302)->first())->value;
        $this->whatsAppCorporativo = optional($profileData->where('field_id', 559)->first())->value;
        $this->numero = optional($profileData->where('field_id', 76)->first())->value;
        $this->cloud = optional($profileData->where('field_id', 77)->first())->value;
        $this->pais = optional($profileData->where('field_id', 288)->first())->value;
        $this->ubicacion = optional($profileData->where('field_id', 53)->first())->value;
        $this->area = optional($profileData->where('field_id', 760)->first())->value;
        $this->etiqueta = optional($profileData->where('field_id', 50)->first())->value;
        $this->modalidad = optional($profileData->where('field_id', 325)->first())->value;

        // Cargar opciones de "etiqueta" desde la base de datos
        $this->etiquetaOptions = DB::connection('wordpress')
            ->table('dxv_bp_xprofile_data')
            ->where('field_id', 50)
            ->pluck('value', 'value')
            ->toArray();

        // Cargar opciones de "ubicación" desde la base de datos
        $this->ubicacionOptions = DB::connection('wordpress')
            ->table('dxv_bp_xprofile_data')
            ->where('field_id', 53)
            ->pluck('value', 'value')
            ->toArray();

        $this->paisOptions = DB::connection('wordpress')
        ->table('dxv_bp_xprofile_data')
        ->where('field_id', 288)
        ->pluck('value', 'value')
        ->toArray();

        $this->areaOptions = DB::connection('wordpress')
        ->table('dxv_bp_xprofile_data')
        ->where('field_id', 760)
        ->pluck('value', 'value')
        ->toArray();

        $this->modalidadOptions = DB::connection('wordpress')
        ->table('dxv_bp_xprofile_data')
        ->where('field_id', 325)
        ->pluck('value', 'value')
        ->toArray();

            // ✅ Filtrar solo los términos que sean "tipo de perfil"
        $this->perfilOptions = DB::connection('wordpress')
            ->table('dxv_terms as t')
            ->join('dxv_term_taxonomy as tt', 't.term_id', '=', 'tt.term_id')
            ->where('tt.taxonomy', 'bp_member_type') // 🔹 Asegúrate de que esta sea la taxonomía correcta en tu BD
            ->pluck('t.name', 't.term_id')
            ->toArray();

        // ✅ Obtener el perfil actual del usuario desde `dxv_term_relationships`
        $this->perfil = DB::connection('wordpress')
            ->table('dxv_term_relationships as tr')
            ->join('dxv_term_taxonomy as tt', 'tr.term_taxonomy_id', '=', 'tt.term_taxonomy_id')
            ->where('tr.object_id', $this->userId)
            ->where('tt.taxonomy', 'bp_member_type') // 🔹 Filtra solo los términos de tipo de perfil
            ->value('tt.term_id'); // ✅ Obtiene el ID real del término en lugar de `term_taxonomy_id`

        // ✅ Manejar el caso en que el usuario no tenga tipo de perfil asignado
        if (!$this->perfil) {
            $this->perfil = array_key_first($this->perfilOptions); // 🔹 Seleccionar el primer tipo de perfil por defecto
        }
    }

    public function updateUser()
    {
        
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
            302 => $this->personalCorreo,
        ];

        foreach ($fields as $field_id => $value) {
            DB::connection('wordpress')->table('dxv_bp_xprofile_data')->updateOrInsert(
                ['user_id' => $this->userId, 'field_id' => $field_id],
                ['value' => $value, 'last_updated' => now()]
            );

            // Generar notificación si se edita el campo 50
            if ($field_id === 50) {
                Notification::create([
                    'user_id' => $this->userId,
                    'title' => 'Cambio de departamento',
                    'message' => $this->nombre . ' ha sido cambiado de departamento a: ' . $value,
                    'is_read' => false,
                ]);
            }
        }

         // ✅ ACTUALIZAR EL TIPO DE PERFIL EN `dxv_term_relationships`
        DB::connection('wordpress')->table('dxv_term_relationships')
            ->updateOrInsert(
                ['object_id' => $this->userId],
                ['term_taxonomy_id' => DB::connection('wordpress')
                    ->table('dxv_term_taxonomy')
                    ->where('term_id', $this->perfil)
                    ->where('taxonomy', 'bp_member_type')
                    ->value('term_taxonomy_id')
                ]
            );

        $this->dispatch('render');
        $this->reset('open');
        session()->flash('messageuser', 'Usuario actualizado correctamente');
    }


    public function render()
    {
        return view('livewire.admin.user.edit-user', [
            'etiquetaOptions' => $this->etiquetaOptions, 
            'ubicacionOptions' => $this->ubicacionOptions,
            'modalidadOptions' => $this->modalidadOptions,
            'paisOptions' => $this->paisOptions,
            'perfilOptions' => $this->perfilOptions
        ]);
    }
}
