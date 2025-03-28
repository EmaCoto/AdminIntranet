<x-content-admin :users="$users" :search="$search">
    <div class="w-full flex justify-between items-center bg-white sticky top-0 z-30 shadow-md">
        <h2 class="text-red-700 font-bold px-2 capitalize">Colaboradores con datos incompletos</h2>
    </div>

    <div id="userList" class="w-full overflow-hidden">
        <table class="min-w-full bg-white border border-gray-300 rounded-lg">
            <thead class="bg-red-100 sticky top-0 z-20">
                <tr>
                    <th class="px-4 py-2 border">Foto</th>
                    <th class="px-4 py-2 border">Nombre</th>
                    <th class="px-4 py-2 border">Usuario</th>
                    <th class="px-4 py-2 border">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($users as $user)
                    <tr class="hover:bg-red-50" wire:key="user-incompleto-{{ $user->ID }}">
                        <td class="px-4 py-2 text-center flex justify-center items-center">
                            <img loading="lazy" src="https://ui-avatars.com/api/?name={{ urlencode($user->first_name . ' ' . $user->last_name) }}&background=fff" alt="Foto de {{ $user->first_name }}" class="w-10 h-10 rounded-full border border-red-700">
                        </td>
                        <td class="px-4 py-2 text-center">
                            <span class="font-bold text-sm">{{ $user->first_name }} {{ $user->last_name }}</span>
                        </td>
                        <td class="px-4 py-2 text-center text-sm text-gray-600">
                            {{ $user->user_login }}
                        </td>
                        <td class="px-4 py-2 w-40">
                            <div class="flex justify-center items-center gap-x-1">
                                {{-- @livewire('admin.user.info-user', ['userId' => $user->ID], key('info-user-'.$user->ID)) --}}
                                @livewire('admin.user.edit-user', ['userId' => $user->ID], key('edit-user-'.$user->ID))                                                              
                            </div>
                        </td>  
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="px-4 py-2 text-center text-gray-500">Todos los usuarios tienen su información completa.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-content-admin>
