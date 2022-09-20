<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Registrar usuario') }}
        </h2>
    </x-slot>

    <x-auth-card class="p-4 w-full max-w-sm" >
        <!-- Validation Errors -->
        <form method="POST" action="{{ route('create') }}">
            @csrf
            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Nombre 1')" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="nombre1" :value="old('nombre1')" required autofocus />
            </div><br>

            <div>
                <x-label for="name" :value="__('Nombre 2')" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="nombre2" :value="old('nombre2')" required autofocus />
            </div><br>


            <div>
                <x-label for="name" :value="__('Apellido 1')" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="apellido1" :value="old('apellido1')" required autofocus />
            </div><br>


            <div>
                <x-label for="name" :value="__('Apellido 2')" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="apellido2" :value="old('apellido2')" required autofocus />
            </div><br>


            <div>
                <x-label for="name" :value="__('Celular')" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="celular" :value="old('celular')" required autofocus />
            </div>


            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Correo Electrónico')" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>


            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>


            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />
                <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
        <x-slot name="logo">
        </x-slot>
    </x-auth-card>
</x-app-layout>