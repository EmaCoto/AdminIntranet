<x-content>
    <x-validation-errors class="mb-4" />

    <div class="w-full mx-auto h-full flex items-center justify-center">
        <form wire:submit.prevent="register" class="bg-gray-50 pb-10 px-10 rounded-lg w-[85%]">
            <div class="relative bg-red-500 text-white font-bold text-center w-6 h-10 mb-4">
                <div class="absolute bottom-0 left-1/2 transform -translate-x-1/2 translate-y-1 w-0 h-0 border-l-[12px] border-l-transparent border-r-[12px] border-r-transparent border-t-[10px] border-t-red-500"></div>
            </div>
            <h1 class="mb-10 text-3xl font-extrabold text-center">
                <span class="text-transparent bg-clip-text bg-gradient-to-r to-[#B33031] from-[#11163D] uppercase">registrar nuevo administrador</span>
            </h1>

            <div class="grid grid-cols-2 gap-x-4">
                <div>
                    <div>
                        <x-label for="name" value="{{ __('Name') }}" />
                        <x-input id="name" class="block mt-1 w-full" type="text" wire:model="name" required autofocus />
                    </div>
                    <div class="mt-4">
                        <x-label for="email" value="{{ __('Email') }}" />
                        <x-input id="email" class="block mt-1 w-full" type="email" wire:model="email" required />
                    </div>
                </div>
                <div>
                    <div>
                        <x-label for="password" value="{{ __('Password') }}" />
                        <x-input id="password" class="block mt-1 w-full" type="password" wire:model="password" required />
                    </div>
                    <div class="mt-4">
                        <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                        <x-input id="password_confirmation" class="block mt-1 w-full" type="password" wire:model="password_confirmation" required />
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
                    {{ __('Register') }}
                </x-button>
            </div>
            @if (session()->has('message'))
                <div class="mt-4 text-green-600">
                    {{ session('message') }}
                </div>
            @endif
        </form>
    </div>

</x-content>

<button href="https://bajozerohelado.com/">
    <div class="svg-wrapper-1">
        <div class="svg-wrapper">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64" width="40" height="32">
                <!-- Cuerpo de la paleta -->
                <path d="M32 4C25 4 20 9 20 16V40C20 45.5 24 50 29 50H35C40 50 44 45.5 44 40V16C44 9 39 4 32 4Z" fill="#FF6F61" stroke="#E94E3E" stroke-width="2"/>

                <!-- Línea de mordida -->
                <path d="M32 12C30 12 28 14 28 16C28 18 30 20 32 20C34 20 36 18 36 16C36 14 34 12 32 12Z" fill="white"/>

                <!-- Palito -->
                <rect x="28" y="48" width="8" height="14" rx="2" ry="2" fill="#D1C27C" stroke="#B09865" stroke-width="2"/>

                <!-- Sombras del cuerpo de la paleta -->
                <path d="M22 32H42V36C42 40 38 44 34 44H30C26 44 22 40 22 36V32Z" fill="rgba(0,0,0,0.1)"/>

                <!-- Detalle de brillo -->
                <circle cx="36" cy="24" r="2" fill="white" opacity="0.6"/>
                <circle cx="28" cy="16" r="2" fill="white" opacity="0.6"/>
            </svg>
        </div>
  </div>
  <span>Volver al inicio</span>
</button>
