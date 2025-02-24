<x-content>
    <x-validation-errors class="mb-4" />

    <div class="w-full mx-auto h-full flex items-center justify-center">
        <form wire:submit.prevent="register" class="bg-gray-200 p-10 rounded-lg w-[85%]">
            <h1 class="mb-10 text-3xl font-extrabold text-center">
                <span class="text-transparent bg-clip-text bg-gradient-to-r to-[#B33031] from-[#11163D] uppercase">registrar nuevo administrador</span>
            </h1>

            <div class="grid grid-cols-2 gap-x-4">
                <div>
                    <div>
                        <x-label for="name" value="{{ __('Name') }}" />
                        <x-input id="name" class="block mt-1 w-full" type="text" wire:model="name" required autofocus autocomplete="off" autocorrect="off" spellcheck="false" autocapitalize="off" />
                    </div>
                    <div class="mt-4">
                        <x-label for="password" value="{{ __('Password') }}" />
                        <x-input id="password" class="block mt-1 w-full" type="password" wire:model="password" required autocomplete="new-password" />
                    </div>
                    <div class="mt-4">
                        <div class="flex">
                            <button type="button" id="generate-password-btn" class="cursor-pointer bg-white relative inline-flex items-center justify-center gap-2 text-sm font-medium ring-offset-background transition focus-visible:outline-none disabled:pointer-events-none disabled:opacity-50 hover:text-[#B33031] h-9 rounded-md px-3 hover:-translate-y-0.5 duration-300 ease-in-out border border-[#B33031]">
                                {{-- <i class="fa-solid fa-key "></i> --}}
                                <i class="fa-solid fa-lock-open text-[#B33031]"></i>
                                Generar contraseña
                            </button>
                            <button type="button" id="toggle-password-btn" class="cursor-pointer bg-white relative inline-flex items-center justify-center gap-2 text-sm font-medium ring-offset-background transition focus-visible:outline-none disabled:pointer-events-none disabled:opacity-50 hover:bg-[#F5F5F5] hover:text-[#B33031] h-9 rounded-md px-3 hover:-translate-y-0.5 duration-300 ease-in-out border hover:border-[#B33031]">
                                <i class="fa-solid fa-eye-low-vision"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div>
                    <div>
                        <x-label for="email" value="{{ __('Email') }}" />
                        <x-input id="email" class="block mt-1 w-full" type="email" wire:model="email" required autocomplete="off" autocorrect="off" spellcheck="false" autocapitalize="off" />
                    </div>
                    <div class="mt-4">
                        <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                        <x-input id="password_confirmation" class="block mt-1 w-full" type="password" wire:model="password_confirmation" required autocomplete="new-password" />
                    </div>                        
                </div>
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-label for="terms">
                        <div class="flex items-center">
                            <x-checkbox name="terms" id="terms" required />
                            <div class="ms-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <x-button class="ms-4">
                    {{ __('Registrar') }}
                </x-button>
            </div>
            @if (session()->has('message'))
                <div id="alert-3" class="flex items-center p-2 mt-4 text-green-800 rounded-lg bg-green-200 border border-green-800" role="alert">
                    <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                    </svg>
                    <span class="sr-only">Info</span>
                    <div class="ms-3 text-sm font-medium">
                        {{ session('message') }}
                    </div>
                </div>
            @endif
        </form>
    </div>
    <script>
        // Función para generar una contraseña aleatoria
        function generatePassword(length = 12) {
            const chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()";
            let password = "";
            for (let i = 0; i < length; i++) {
                password += chars.charAt(Math.floor(Math.random() * chars.length));
            }
            return password;
        }
        
        // Al hacer clic en el botón de generar, se asigna la nueva contraseña a ambos campos
        document.getElementById("generate-password-btn").addEventListener("click", function() {
            const newPassword = generatePassword();
            document.getElementById("password").value = newPassword;
            document.getElementById("password_confirmation").value = newPassword;
        });
        
        // Función para alternar la visibilidad de las contraseñas
        function togglePasswordVisibility() {
            const passwordField = document.getElementById("password");
            const confirmField = document.getElementById("password_confirmation");
            const newType = passwordField.type === "password" ? "text" : "password";
            passwordField.type = newType;
            confirmField.type = newType;
        }
        
        // Evento para el botón de mostrar/ocultar contraseña
        document.getElementById("toggle-password-btn").addEventListener("click", togglePasswordVisibility);
    </script>
</x-content>
