<x-content-admin :users="$users">
    <div id="userList" class="grid grid-cols-5">
        {{-- Mostrar usuarios --}}
        @forelse ($users as $user)
            <ul class="user-item h-48 rounded-lg hover:shadow-xl hover:bg-gray-400 m-1 flex flex-col justify-between p-2">
                <li class="flex flex-col items-center">
                    <div class="-mb-4 z-10">
                        <img src="{{ asset('img/photo.jpg') }}" alt="" class="w-16 h-16 rounded-full shadow-lg shadow-blue-900">
                    </div>
                    <div class="bg-white p-2 rounded-t-lg shadow-lg text-center w-full">
                        @if($user->first_name || $user->last_name || $user->job_title)
                            <div class="mt-4">
                                <p class="user-name font-bold text-sm block truncate">{{ $user->first_name }} {{ $user->last_name }}</p>
                                <p class="user-name text-sm block truncate">{{ $user->job_title }}</p>
                            </div>
                        @endif
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
                    <button @click="$dispatch('sweet-delete', {{ $user->ID }})" class="group relative flex p-1 w-full flex-col items-center justify-center overflow-hidden rounded-b-lg bg-[#B33031] hover:bg-red-600">
                        <svg viewBox="0 0 1.625 1.625" class="absolute -top-7 fill-white delay-100 group-hover:top-2 group-hover:animate-[spin_1.4s] group-hover:duration-1000" height="15" width="15">
                            <path d="M.471 1.024v-.52a.1.1 0 0 0-.098.098v.618c0 .054.044.098.098.098h.487a.1.1 0 0 0 .098-.099h-.39c-.107 0-.195 0-.195-.195"></path>
                            <path d="M1.219.601h-.163A.1.1 0 0 1 .959.504V.341A.033.033 0 0 0 .926.309h-.26a.1.1 0 0 0-.098.098v.618c0 .054.044.098.098.098h.487a.1.1 0 0 0 .098-.099v-.39a.033.033 0 0 0-.032-.033"></path>
                            <path d="m1.245.465-.15-.15a.02.02 0 0 0-.016-.006.023.023 0 0 0-.023.022v.108c0 .036.029.065.065.065h.107a.023.023 0 0 0 .023-.023.02.02 0 0 0-.007-.016"></path>
                        </svg>
                        <svg width="16" fill="none" viewBox="0 0 39 7" class="origin-right duration-500 group-hover:opacity-0">
                            <line stroke-width="4" stroke="#ECECEC" y2="5" x2="39" y1="5"></line>
                            <line stroke-width="3" stroke="#ECECEC" y2="1.5" x2="26.0357" y1="1.5" x1="12"></line>
                        </svg>
                        <svg width="16" fill="none" viewBox="0 0 33 39" class="">
                            <mask fill="#ECECEC" id="path-1-inside-1_8_19">
                                <path d="M0 0H33V35C33 37.2091 31.2091 39 29 39H4C1.79086 39 0 37.2091 0 35V0Z"></path>
                            </mask>
                            <path mask="url(#path-1-inside-1_8_19)" fill="#ECECEC" d="M0 0H33H0ZM37 35C37 39.4183 33.4183 43 29 43H4C-0.418278 43 -4 39.4183 -4 35H4H29H37ZM4 43C-0.418278 43 -4 39.4183 -4 35V0H4V35V43ZM37 0V35C37 39.4183 33.4183 43 29 43V35V0H37Z"></path>
                            <path stroke-width="4" stroke="#ECECEC" d="M12 6L12 29"></path>
                            <path stroke-width="4" stroke="#ECECEC" d="M21 6V29"></path>
                        </svg>
                    </button>
                </div>
            </ul>
        @empty
            <p class="text-white">No se encontraron usuarios.</p>
        @endforelse
    </div>
    <x-sweet-delete />
</x-content-admin>
