<?php

namespace App\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Carbon\Carbon;

class BirthdayCalendar extends Component
{
    public $birthdaysByMonth = [];
    public $selectedMonth; // Nuevo: mes seleccionado por el usuario

    public function mount()
    {
        $today = Carbon::today();
        $currentYear = $today->year;

        // Obtener los usuarios con fecha de nacimiento (field_id 212)
        $users = DB::connection('wordpress')
            ->table('dxv_bp_xprofile_data as birth')
            ->join('dxv_bp_xprofile_data as name', function ($join) {
                $join->on('birth.user_id', '=', 'name.user_id')
                    ->where('name.field_id', '=', 1); // ID del campo "nombre"
            })
            ->join('dxv_bp_xprofile_data as lastname', function ($join) {
                $join->on('birth.user_id', '=', 'lastname.user_id')
                    ->where('lastname.field_id', '=', 2); // ID del campo "apellido"
            })
            ->where('birth.field_id', 212) // ID del campo "fecha de nacimiento"
            ->select(
                'birth.user_id',
                'birth.value as birth_date',
                'name.value as first_name',
                'lastname.value as last_name'
            )
            ->get();

        $birthdays = [];

        foreach ($users as $user) {
            $birthDate = Carbon::parse($user->birth_date);
            $birthdayThisYear = Carbon::create($currentYear, $birthDate->month, $birthDate->day);
            
            // Calcular la edad que van a cumplir
            $ageNext = $birthDate->age; 
        
            // Verificar si hoy es su cumpleaños
            $isToday = $birthdayThisYear->isToday();

            // Verificar si el cumpleaños ya pasó este año
            $isPast = $birthdayThisYear->lessThan($today);

            // Agregar todos los cumpleaños, incluyendo los que ya pasaron
            $birthdays[$birthDate->month][] = [
                'name' => "{$user->first_name} {$user->last_name}",
                'first_name' => "{$user->first_name}",
                'last_name' => "{$user->last_name}",
                'birthday' => $birthdayThisYear->format('d M'),
                'age_next' => $ageNext, // Edad que va a cumplir
                'is_today' => $isToday, // Si es su cumpleaños hoy
                'is_past' => $isPast // Si ya pasó su cumpleaños
            ];
        }

        // Ordenar los meses y los cumpleaños dentro de cada mes
        ksort($birthdays);
        foreach ($birthdays as &$monthBirthdays) {
            usort($monthBirthdays, fn($a, $b) => strtotime($a['birthday']) - strtotime($b['birthday']));
        }

        $this->birthdaysByMonth = $birthdays;
        $this->selectedMonth = Carbon::now()->month; // Iniciar con el mes actual
    }

    public function selectMonth($month)
    {
        $this->selectedMonth = $month;
    }

    public function render()
    {
        return view('livewire.birthday-calendar', [
            'months' => array_keys($this->birthdaysByMonth),
            'birthdays' => $this->birthdaysByMonth[$this->selectedMonth] ?? []
        ]);
    }
}
