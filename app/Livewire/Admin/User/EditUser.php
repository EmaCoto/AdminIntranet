<?php

namespace App\Livewire\Admin\User;

use Illuminate\Support\Facades\DB;
use App\Models\Notification;
use Livewire\Component;

class EditUser extends Component
{
    public $open = false;
    public $tab = 'info'; // Puede ser: info, documentos, historial, permisos
    public $userId, $user;
    public $nombre, $apellido, $etiqueta, $usuario, $ubicacion, $numero, $correo, $personalCorreo, $cloud, $pais, $modalidad, $perfil, $outlook, $whatsAppCorporativo, $area, $cedula, $talla, $nacimiento, $ingreso;
    public $etiquetaOptions = [], $ubicacionOptions = [], $paisOptions = [], $modalidadOptions = [], $areaOptions = [], $perfilOptions = [], $tallaOptions = [];

    public function mount($userId)
    {
        $this->userId = $userId;
        $this->user = DB::connection('wordpress')->table('dxv_users')->where('ID', $this->userId)->first();

        $profileData = DB::connection('wordpress')
            ->table('dxv_bp_xprofile_data')
            ->where('user_id', $this->userId)
            ->whereIn('field_id', [1, 2, 3, 999, 1000, 558, 78, 302, 559, 76, 77, 288, 53, 760, 50, 212, 324, 325])
            ->pluck('value', 'field_id');

       // Asignar datos personales
        $this->nombre = $profileData[1] ?? null;
        $this->apellido = $profileData[2] ?? null;
        $this->usuario = $profileData[3] ?? null;
        $this->cedula = $profileData[999] ?? null;
        $this->talla = $profileData[1000] ?? null;
        $this->nacimiento = $profileData[212] ?? null;
        $this->personalCorreo = $profileData[302] ?? null;
       // Asignar datos corporativos
        $this->whatsAppCorporativo = $profileData[559] ?? null;
        $this->numero = $profileData[76] ?? null;
        $this->outlook = $profileData[558] ?? null;
        $this->correo = $profileData[78] ?? null;
        $this->cloud = $profileData[77] ?? null;
        $this->pais = $profileData[288] ?? null;
        $this->ubicacion = $profileData[53] ?? null;
        $this->area = $profileData[760] ?? null;
        $this->etiqueta = $profileData[50] ?? null;
        $this->ingreso = $profileData[324] ?? null;
        $this->modalidad = $profileData[325] ?? null;

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

        $this->tallaOptions = DB::connection('wordpress')
        ->table('dxv_bp_xprofile_data')
        ->where('field_id', 1000)
        ->pluck('value', 'value')
        ->toArray();

       // Asignar datos corporativo
        $this->perfilOptions = DB::connection('wordpress')
        ->table('dxv_terms as t')
        ->join('dxv_term_taxonomy as tt', 't.term_id', '=', 'tt.term_id')
        ->join('dxv_term_relationships as tr', 'tt.term_taxonomy_id', '=', 'tr.term_taxonomy_id')
        ->where('tt.taxonomy', 'bp_member_type')
        ->distinct()
        ->orderBy('t.name')
        ->pluck('t.name', 't.term_id')
        ->toArray();
      

        $this->perfil = DB::connection('wordpress')
            ->table('dxv_term_relationships as tr')
            ->join('dxv_term_taxonomy as tt', 'tr.term_taxonomy_id', '=', 'tt.term_taxonomy_id')
            ->where('tr.object_id', $this->userId)
            ->where('tt.taxonomy', 'bp_member_type')
            ->value('tt.term_id') ?? array_key_first($this->perfilOptions);
    }

    public function updateUser()
    {
        $this->limpiarPerfilesDuplicados();

        $etiquetaAnterior = DB::connection('wordpress')
            ->table('dxv_bp_xprofile_data')
            ->where('user_id', $this->userId)
            ->where('field_id', 50)
            ->value('value');
    
        $fields = [
            1 => $this->nombre,
            2 => $this->apellido,
            3 => $this->usuario,
            999 => $this->cedula,
            1000 => $this->talla,
            558 => $this->outlook,
            78 => $this->correo,
            302 => $this->personalCorreo,
            559 => $this->whatsAppCorporativo,
            76 => $this->numero,
            77 => $this->cloud,
            288 => $this->pais,
            53 => $this->ubicacion,
            760 => $this->area,
            50 => $this->etiqueta,
            212 => $this->nacimiento,
            324 => $this->ingreso,
            325 => $this->modalidad,
        ];
    
        foreach ($fields as $field_id => $value) {
            $value = $value ?? ''; // Convertir NULL a cadena vacía
    
            DB::connection('wordpress')->table('dxv_bp_xprofile_data')->updateOrInsert(
                ['user_id' => $this->userId, 'field_id' => $field_id],
                ['value' => $value, 'last_updated' => now()]
            );
    
            if ($field_id === 50 && $etiquetaAnterior !== $value) {
                Notification::create([
                    'user_id' => $this->userId,
                    'title' => 'Cambio de departamento',
                    'message' => "{$this->nombre} {$this->apellido} ha sido cambiado del departamento de '{$etiquetaAnterior}' a '{$value}'",
                    'is_read' => false,
                ]);
            }
        }
    
        // Actualizar display_name en dxv_users
        $displayName = ucwords(strtolower("{$this->nombre} {$this->apellido}"));
        DB::connection('wordpress')->table('dxv_users')
            ->where('ID', $this->userId)
            ->update(['display_name' => $displayName]);
    
        // Actualizar first_name y last_name en dxv_usermeta
        $meta_fields = [
            'first_name' => $this->nombre,
            'last_name' => $this->apellido
        ];
    
        foreach ($meta_fields as $key => $value) {
            DB::connection('wordpress')->table('dxv_usermeta')->updateOrInsert(
                ['user_id' => $this->userId, 'meta_key' => $key],
                ['meta_value' => $value]
            );
        }
    
        // ✅ Eliminar relaciones anteriores del perfil del usuario
        DB::connection('wordpress')->table('dxv_term_relationships')
            ->where('object_id', $this->userId)
            ->whereIn('term_taxonomy_id', function ($query) {
                $query->select('term_taxonomy_id')
                      ->from('dxv_term_taxonomy')
                      ->where('taxonomy', 'bp_member_type');
            })
            ->delete();
    
        // ✅ Insertar nueva relación de perfil
        $termTaxonomyId = DB::connection('wordpress')
            ->table('dxv_term_taxonomy')
            ->where('term_id', $this->perfil)
            ->where('taxonomy', 'bp_member_type')
            ->value('term_taxonomy_id');
    
        DB::connection('wordpress')->table('dxv_term_relationships')->insert([
            'object_id' => $this->userId,
            'term_taxonomy_id' => $termTaxonomyId,
        ]);
    
        $this->dispatch('render');
        $this->reset('open');
        session()->flash('messageuser', 'Usuario actualizado correctamente');
    }

public function limpiarPerfilesDuplicados()
{
    // Obtener todos los perfiles asignados al usuario
    $relaciones = DB::connection('wordpress')
        ->table('dxv_term_relationships as tr')
        ->join('dxv_term_taxonomy as tt', 'tr.term_taxonomy_id', '=', 'tt.term_taxonomy_id')
        ->where('tt.taxonomy', 'bp_member_type')
        ->where('tr.object_id', $this->userId)
        ->pluck('tr.term_taxonomy_id');

    // Si hay más de uno, conservar solo el primero
    if ($relaciones->count() > 1) {
        $termTaxonomyIdAConservar = $relaciones->first();

        // Eliminar los demás
        DB::connection('wordpress')->table('dxv_term_relationships')
            ->where('object_id', $this->userId)
            ->where('term_taxonomy_id', '!=', $termTaxonomyIdAConservar)
            ->delete();

        session()->flash('messageuser', 'Perfiles duplicados del usuario fueron limpiados.');
    }
}

    public function render()
    {
        return view('livewire.admin.user.edit-user', [
            'etiquetaOptions' => $this->etiquetaOptions,
            'ubicacionOptions' => $this->ubicacionOptions,
            'modalidadOptions' => $this->modalidadOptions,
            'tallaOptions' => $this->tallaOptions,
            'paisOptions' => $this->paisOptions,
            'perfilOptions' => $this->perfilOptions,
        ]);
    }
}
