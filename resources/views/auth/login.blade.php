<x-guest-layout>

    <div class="grid grid-cols-2 min-h-screen">
        <div style="background-image: url('{{ asset('img/login_photo.png') }}');" class="bg-cover bg-gradient-to-b from-[#11163D] via-[#1c2464] to-[#B33031]" >
            <div class="flex flex-col justify-end h-full text-white px-28 text-justify bg-black bg-opacity-60">
                <h1 class="text-center font-bold text-2xl">HURUS</h1>
                <p class="text-center font-bold text-2xl mb-5">Panel Administrativo</p>
                <p class="mb-20">Hurus es una plataforma administrativa diseñada para simplificar la gestión de usuarios en tu intranet. Permite crear, editar y eliminar usuarios de forma eficiente, manteniendo un registro detallado del total de usuarios activos en la empresa. Con Hurus, tienes control total sobre la información del personal, facilitando la administración y el monitoreo de sus actividades, todo desde un solo panel centralizado.</p>
            </div>
        </div>

        <div class="flex flex-col justify-center">
            <x-authentication-card-logo />
            <x-validation-errors class="mb-4" />
            @session('status')
                <div class="mb-4 font-medium text-sm text-green-600">
                    {{ $value }}
                </div>
            @endsession
            <form method="POST" action="{{ route('login') }}" class="px-20">
                @csrf
                <div>
                    <x-label for="email" value="{{ __('Email') }}" />
                    <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                </div>
                <div class="mt-4">
                    <x-label for="password" value="{{ __('Password') }}" />
                    <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
                </div>
                <div class="block mt-4">
                    <label for="remember_me" class="flex items-center">
                        <x-checkbox id="remember_me" name="remember" />
                        <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                    </label>
                </div>
                <div class="flex items-center justify-end mt-4">
                    @if (Route::has('password.request'))
                        <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif
                    <x-button>
                        {{ __('Login') }}
                    </x-button>
                </div>
            </form>
        </div>
    </div>

</x-guest-layout>
