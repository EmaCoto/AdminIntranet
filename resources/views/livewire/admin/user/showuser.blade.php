<x-content-admin>
    <div id="userList" class="grid grid-cols-5">
        {{-- Mostrar usuarios --}}
        @forelse ($users as $user)
            <ul class="user-item h-48 rounded-lg hover:shadow-xl hover:bg-gray-400 m-1 flex flex-col justify-between p-2">
                <li class="flex flex-col items-center">
                    <div class="-mb-4 z-10">
                        <img src="{{ asset('img/photo.jpg') }}" alt="" class="w-16 h-16 rounded-full shadow-lg shadow-blue-900">
                    </div>
                    <div class="bg-gray-100 p-2 rounded-t-lg shadow-lg text-center w-full">
                        <div class="pt-4">
                            <span class="user-name font-bold text-sm block truncate">{{ $user->user_login }}</span>
                        </div>
                        <div>
                            <span class="user-email font-bold text-xs block truncate">{{ $user->user_email }}</span>
                        </div>
                    </div>
                </li>
                <div class="h-full items-end border-t-2">
                    <div class="grid grid-cols-2">
                        <div class="w-full border-l">
                            @livewire('admin.user.info-user', ['userId' => $user->ID], key('info-user-'.$user->ID))
                        </div>
                        <div class="w-full border-l">
                            @livewire('admin.user.edit-user', ['userId' => $user->ID], key('edit-user-'.$user->ID))
                        </div>
                    </div>
                    <button wire:click="deleteUser({{ $user->ID }})" class="bg-[#B33031] rounded-b-lg p-1 text-white text-sm hover:scale-90 duration-300 active:bg-gray-600 w-full">
                        <i class="fa-regular fa-trash-can"></i>
                    </button>
                </div>
            </ul>
        @empty
            <p class="text-white">No se encontraron usuarios.</p>
        @endforelse
    </div>
</x-content-admin>
