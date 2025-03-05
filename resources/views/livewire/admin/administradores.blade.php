<x-content-admin :users="$users" :search="$search">
    <div id="userList" class="w-full overflow-hidden">
        <table class="min-w-full bg-white border border-gray-300 rounded-lg">
            <thead class="bg-gray-100 sticky top-0 z-20">
                <tr>
                    <th class="px-4 py-2 border">Foto</th>
                    <th class="px-4 py-2 border">Nombre</th>
                    <th class="px-4 py-2 border">Correo</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($users as $user)
                    <tr class="hover:bg-gray-200" wire:key="user-{{ $user->id }}">
                        <td class="px-4 py-2 text-center flex justify-center items-center">
                            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                <div class="flex flex-col items-center text-center">
                                    <div class="flex text-sm border-2 rounded-full focus:outline-none focus:border-gray-300">
                                        @if ($user->profile_photo_path)
                                            <img class="h-10 w-10 rounded-full border border-dashed border-blue-800 object-cover" src="{{ asset('storage/'.$user->profile_photo_path) }}" alt="{{ $user->name }}" />
                                        @else
                                            <img class="h-10 w-10 rounded-full border border-dashed border-blue-800 object-cover" src="{{ $user->profile_photo_url }}" alt="{{ $user->name }}" /> 
                                        @endif
                                    </div>
                                </div>
                            @endif
                        </td>
                        <td class="px-4 py-2 text-center">
                            <span class="font-bold text-sm">{{ $user->name }}</span>
                        </td>
                        <td class="px-4 py-2 text-center">
                            <span class="text-sm">{{ $user->email }}</span>
                        </td>                    
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="px-4 py-2 text-center text-gray-500">No se encontraron administradores.</td>
                    </tr>
                @endforelse
            </tbody>            
        </table>
    </div>
    <x-sweet-delete />
</x-content-admin>
