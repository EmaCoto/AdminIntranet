<?php

namespace App\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Carbon\Carbon;

class BirthdayCalendar extends Component
{
    public $birthdaysByMonth = [];
    public $todaysBirthdays = [];
    public $selectedMonth;

    protected $countryFlags = [
        'Colombia' => 'https://flagcdn.com/w40/co.png',
        'Estados Unidos' => 'https://flagcdn.com/w40/us.png',
        'Argentina' => 'https://flagcdn.com/w40/ar.png',
        'México' => 'https://flagcdn.com/w40/mx.png',
        'Puerto Rico' => 'https://flagcdn.com/w40/pr.png',
        'Costa Rica' => 'https://flagcdn.com/w40/cr.png',
    ];

    public function mount()
    {
        $today = Carbon::today();
        $currentYear = $today->year;
    
        // Obtener los usuarios con fecha de nacimiento (field_id 212)
        $users = DB::connection('wordpress')
            ->table('dxv_bp_xprofile_data as birth')
            ->join('dxv_bp_xprofile_data as name', function ($join) {
                $join->on('birth.user_id', '=', 'name.user_id')
                    ->where('name.field_id', '=', 1);
            })
            ->join('dxv_bp_xprofile_data as lastname', function ($join) {
                $join->on('birth.user_id', '=', 'lastname.user_id')
                    ->where('lastname.field_id', '=', 2);
            })
            ->leftJoin('dxv_bp_xprofile_data as country', function ($join) {
                $join->on('birth.user_id', '=', 'country.user_id')
                    ->where('country.field_id', '=', 288);
            })
            ->where('birth.field_id', 212)
            ->select(
                'birth.user_id',
                'birth.value as birth_date',
                'name.value as first_name',
                'lastname.value as last_name',
                'country.value as country'
            )
            ->get();
    
        $birthdays = [];
        $todaysBirthdays = [];
    
        foreach ($users as $user) {
            try {
                $birthDate = Carbon::parse($user->birth_date);
            } catch (\Exception $e) {
                continue; // Si la fecha no es válida, omitir este usuario
            }
    
            $birthdayThisYear = Carbon::create($currentYear, $birthDate->month, $birthDate->day);
            $ageNext = $birthDate->age;
    
            // Filtrar usuarios con edad 0 o negativa
            if ($ageNext <= 0) {
                continue;
            }
    
            $isToday = $birthdayThisYear->isToday();
            $isPast = $birthdayThisYear->lessThan($today);
    
            // Verificar si el país está definido y tiene una bandera
            $userCountry = $user->country ?? 'Desconocido';
            $flagUrl = $this->countryFlags[$userCountry] ?? null;
    
            $birthdayData = [
                'name' => "{$user->first_name} {$user->last_name}",
                'first_name' => "{$user->first_name}",
                'last_name' => "{$user->last_name}",
                'birthday' => $birthdayThisYear->format('d M'),
                'age_next' => $ageNext,
                'is_today' => $isToday,
                'is_past' => $isPast,
                'country' => $userCountry,
                'flag' => $flagUrl
            ];
    
            if ($isToday) {
                $todaysBirthdays[] = $birthdayData;
            } else {
                $birthdays[$birthDate->month][] = $birthdayData;
            }
        }
    
        ksort($birthdays);
        foreach ($birthdays as &$monthBirthdays) {
            usort($monthBirthdays, function ($a, $b) {
                return strtotime($a['birthday']) - strtotime($b['birthday']);
            });
        }
    
        $this->birthdaysByMonth = $birthdays;
        $this->todaysBirthdays = $todaysBirthdays;
        $this->selectedMonth = Carbon::now()->month;
    }
    

    public function selectMonth($month)
    {
        $this->selectedMonth = $month;
    }

    public function render()
    {
        return view('livewire.birthday-calendar', [
            'months' => array_keys($this->birthdaysByMonth),
            'birthdays' => $this->birthdaysByMonth[$this->selectedMonth] ?? [],
            'todaysBirthdays' => $this->todaysBirthdays
        ]);
    }
}
