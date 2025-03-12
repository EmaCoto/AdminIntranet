<x-content-admin :users="$users" :search="$search">
    <div class="w-full flex justify-between items-center bg-white sticky top-0 z-50 shadow-md">
        <h2 class="text-slate-400 font-bold px-2 capitalize">Colaboradores que faltan por llenar la información</h2>
        <button wire:click="exportVacio" class="bg-green-600 hover:bg-green-700 text-white px-3 py-1 rounded-tr-md w-fit">
            <i class="fa-solid fa-download mr-2"></i> Exportar
        </button>
    </div>
    <div id="userList" class="w-full overflow-hidden">
        <table class="min-w-full bg-white border border-gray-300 rounded-lg">
            <thead class="bg-gray-100 sticky top-0 z-20">
                <tr>
                    <th class="px-4 py-2 border">Foto</th>
                    <th class="px-4 py-2 border">Nombre</th>
                    <th class="px-4 py-2 border">Departamento</th>
                    <th class="px-4 py-2 border">Cargo</th>
                    <th class="px-4 py-2 border">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($users as $user)
                    <tr class="hover:bg-gray-200" wire:key="user-{{ $user->ID }}">
                        <td class="px-4 py-2 text-center flex justify-center items-center">
                            <img loading="lazy" src="https://ui-avatars.com/api/?name={{ urlencode($user->first_name . ' ' . $user->last_name) }}&background=fff" alt="Foto de {{ $user->first_name }}" class="w-10 h-10 rounded-full border border-blue-800">
                        </td>
                        <td class="px-4 py-2 text-center">
                            <span class="font-bold text-sm">{{ $user->first_name }} {{ $user->last_name }}</span>
                        </td>
                        <td class="px-4 py-2 text-center">
                            <span class="text-sm">{{ $user->job_title }}</span>
                        </td>
                        <td class="px-4 py-2 text-center">
                            <span class="text-sm">{{ $user->cargo }}</span>
                        </td>
                        <td class="px-4 py-2 w-40">
                            <div class="flex justify-center items-center gap-x-1">
                                @livewire('admin.user.info-user', ['userId' => $user->ID], key('info-user-'.$user->ID))
                                @livewire('admin.user.edit-user', ['userId' => $user->ID], key('edit-user-'.$user->ID))                                
                                
                                {{-- <button @click="$dispatch('sweet-delete', {{ $user->ID }})"
                                    class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded-md">
                                    <i class="fa-solid fa-trash"></i>
                                </button> --}}
                                
                                <button @click="$dispatch('sweet-delete', { ID: {{ $user->ID }} })"
                                    class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded-md">
                                    <i class="fa-solid fa-trash"></i>
                                </button>                                
                            </div>
                        </td>                        
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-4 py-2 text-center text-gray-500">No se encontraron usuarios.</td>
                    </tr>
                @endforelse
            </tbody>            
        </table>
    </div>
    <x-sweet-delete />
</x-content-admin>