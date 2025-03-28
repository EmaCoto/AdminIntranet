<?php

namespace App\Livewire\Admin\User;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class InfoUser extends Component
{
    protected $listeners = ['render'];

    public $open = false;
    public $userId, $user;
    public $nombre, $apellido, $etiqueta, $usuario, $ubicacion, $numero, $correo, $personalCorreo, $cloud, $pais, $modalidad, $perfil, $outlook, $whatsAppCorporativo, $area, $cedula, $talla, $nacimiento, $ingreso;
    public $perfilOptions = [];

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
        $this->outlook = $profileData[558] ?? null;
        $this->personalCorreo = $profileData[302] ?? null;
        $this->nacimiento = $profileData[212] ?? null;
        $this->correo = $profileData[78] ?? null;
        $this->whatsAppCorporativo = $profileData[559] ?? null;
        $this->numero = $profileData[76] ?? null;
        $this->cloud = $profileData[77] ?? null;
        $this->pais = $profileData[288] ?? null;
        $this->ubicacion = $profileData[53] ?? null;
        $this->area = $profileData[760] ?? null;
        $this->etiqueta = $profileData[50] ?? null;
        $this->ingreso = $profileData[324] ?? null;
        $this->modalidad = $profileData[325] ?? null;

        // Obtener opciones de perfil
        $this->perfilOptions = DB::connection('wordpress')
            ->table('dxv_terms as t')
            ->join('dxv_term_taxonomy as tt', 't.term_id', '=', 'tt.term_id')
            ->where('tt.taxonomy', 'bp_member_type')
            ->pluck('t.name', 't.term_id')
            ->toArray();

        // Obtener perfil del usuario
        $this->perfil = DB::connection('wordpress')
            ->table('dxv_term_relationships as tr')
            ->join('dxv_term_taxonomy as tt', 'tr.term_taxonomy_id', '=', 'tt.term_taxonomy_id')
            ->where('tr.object_id', $this->userId)
            ->where('tt.taxonomy', 'bp_member_type')
            ->value('tt.term_id') ?? array_key_first($this->perfilOptions);
    }

    public function render()
    {
        return view('livewire.admin.user.info-user', [
            'perfilOptions' => $this->perfilOptions,
        ]);
    }
}
