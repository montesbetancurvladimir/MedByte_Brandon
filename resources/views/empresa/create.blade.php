<!-- Token select triple-->
<meta name="csrf-token" content="{{ csrf_token() }}">
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Registrar centro médico.') }}
        </h2>
    </x-slot>

    <x-auth-card class="p-4 w-full max-w-sm" >

        <!-- Validation Errors -->

        <form method="POST" action="{{ route('Empresa.store') }}">
            @csrf
            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Razón Social')" />
                <x-input id="razon_social" class="block mt-1 w-full" type="text" name="razon_social" :value="old('nombre1')" required autofocus />
            </div><br>

            <div>
                <x-label for="name" :value="__('Tipo Documento')" />
                <select name="tipo_documento_id" class="form-select">
                    <option>Seleccione una opción.</option>
                    @foreach ($tipo_documento_empresa_id as $descripcion => $id)
                        <option {{old("tipo_documento_empresa_id","") == $id ? "selected" : ""}} value="{{ $id }}">{{ $descripcion }}</option>
                    @endforeach
                </select>
            </div><br>


            <div>
                <x-label for="name" :value="__('Número Documento')" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="numero_documento" :value="old('apellido1')" required autofocus />
            </div><br>


            <div>
                <x-label for="name" :value="__('País')" />
                <select name="tipo_pais_id" id="_pais">
                    <option value=""">Seleccione una opción.</option>
                    @foreach ($paises as $item)
                    <option value="{{$item->id}}">{{$item->descripcion}}</option>
                    @endforeach
                </select>
            </div><br>
            <div>
                <x-label for="name" :value="__('Departamento')" />
                <select name="tipo_departamento_id" id="_departamento"></select>
            </div><br>
            <div>
                <x-label for="name" :value="__('Municipio')" />
                <select name="tipo_ciudad_id" id="_municipio"></select>
            </div><br>


            <div>
                <x-label for="name" :value="__('Teléfono')" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="telefono" :value="old('celular')" required autofocus />
            </div>


            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Correo Electrónico')" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>


            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Dirección')" />
                <x-input id="direccion" class="block mt-1 w-full" type="text" name="direccion" required autocomplete="new-password" />
            </div>


            <div class="flex items-center justify-end mt-4">
                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>

        <script>
            //Se necesita el token
            const csrfToken = document.head.querySelector("[name~=csrf-token][content]").content;
            //Detectar el cambio el select en categoria.
            document.getElementById('_pais').addEventListener('change',(e)=>{
                fetch('departamentos',{
                    method : 'POST',
                    body: JSON.stringify({texto : e.target.value}),
                    headers:{
                        'Content-Type': 'application/json',
                        "X-CSRF-Token": csrfToken
                    }
                }).then(response =>{
                    return response.json()
                }).then( data =>{
                    var opciones ="<option value=''>Elegir</option>";
                    for (let i in data.lista) {
                    opciones+= '<option value="'+data.lista[i].id+'">'+data.lista[i].descripcion+'</option>';
                    }
                    document.getElementById("_departamento").innerHTML = opciones;
                }).catch(error =>console.error(error));
            })

            document.getElementById('_departamento').addEventListener('change',(e)=>{
                fetch('municipios',{
                    method : 'POST',
                    body: JSON.stringify({texto : e.target.value}),
                    headers:{
                        'Content-Type': 'application/json',
                        "X-CSRF-Token": csrfToken
                    }
                }).then(response =>{
                    return response.json()
                }).then( data =>{
                    var opciones ="<option value=''>Elegir</option>";
                    for (let i in data.lista) {
                    opciones+= '<option value="'+data.lista[i].id+'">'+data.lista[i].descripcion+'</option>';
                    }
                    document.getElementById("_municipio").innerHTML = opciones;
                }).catch(error =>console.error(error));
            })

        </script>  

        <x-slot name="logo">
        </x-slot>
    </x-auth-card>
</x-app-layout>