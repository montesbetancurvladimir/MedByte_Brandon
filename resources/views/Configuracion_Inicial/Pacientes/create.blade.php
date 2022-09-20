<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- TOKEN SELECT TRIPLE--}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Usuarios</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="../../css/main.css">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;600;700&display=swap" rel="stylesheet">

</head>

<body>
    <header>
        <div class="d-flex barra justify-content-evenly align-items-center ">
            <div class="">
                <img src="../../img/logo-medbyte.png" alt="">
            </div>

            <div class="ancho-links">
                <nav class="flex gap-2">
                    <a href="" class="text-light">Home</a>
                    <a href="" class="text-light">Mensajes</a>
                    <a href="" class="text-light">Estadisticas</a>
                    <a href="" class="text-light">Pacientes</a>
                </nav>
            </div>

            <div class="d-flex align-items-center gap-2  ">
                <div class="dropdown border rounded-pill">
                    <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Es
                    </button>
                    <ul class="dropdown-menu ">
                        <li><a class="dropdown-item" href="#">Ingles</a></li>
                        <li><a class="dropdown-item" href="#">Portugues</a></li>
                    </ul>
                </div>
                <div>
                    <button class="border border-0 bg-transparent  "><i
                            class="bi bi-gear text-light configuracion fs-3"></i></button>
                </div>
                <div class="btn-group  rounded-pill " role="group" aria-label="Basic example">
                    <button type="button" class="btn primario">Iniciar sesión</button>
                    <button type="button" class="btn primario">Crea tu cuenta</button>
                </div>
                <span><i class="bi bi-person-circle fs-3 texto-primario"></i></span>
            </div>
        </div>
    </header>

    <main class="container">
        <h1>Creación de pacientes.</h1>

        <div>
            <h3>Datos de pacientes</h3>
        </div>

        <div>
            <form method="POST" action="{{ route('Pacientes.store') }}" class="d-flex gap-5" enctype="multipart/form-data">
                @csrf
                <div class="row  ancho">
                    <div class="col">
                        <div class="input-usuarios">
                            <label class="d-block " for="">Nombre*</label>
                            <input name="nombre1" type="text" value="{{ old("nombre1","")}}" required autofocus>
                        </div>

                        <div class="input-usuarios">
                            <label class="d-block" for="">Segundo Apellido*</label>
                            <input name="apellido2" type="text" value="{{ old("apellido2","")}}" required autofocus>
                        </div>

                        <div class="input-usuarios">
                            <label class="d-block" for="">Fecha de nacimiento*</label>
                            <input name="fecha_nacimiento" type="date" value="{{ old("fecha_nacimiento","")}}" required autofocus>
                        </div>

                        <div class="input-usuarios">
                            <label class="d-block" for="">Teléfono*</label>
                            <input name="telefono" type="text" value="{{ old("telefono","")}}" required autofocus>
                        </div>

                        <div class="input-usuarios">
                            <label class="d-block" for="">País*</label>
                            <select name="pais" id="_pais"  class="form-select" required autofocus>
                                <option value="">Seleccione una opción.</option>
                                @foreach ($paises as $item)
                                <option value="{{$item->id}}">{{$item->descripcion}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row ancho">
                    <div class="col">
                        <div class="input-usuarios">
                            <label class="d-block" class="d-block" for="">Segundo nombre</label>
                            <input name="nombre2" type="text" value="{{ old("nombre2","")}}">
                        </div>
                    </div>
                    <div class="input-usuarios">
                        <label class="d-block" for="">Tipo Documento*</label>
                        <select name="tipo_documento_id" class="form-select" required autofocus>
                            <option>Seleccione una opción</option>
                            {{-- Se trae la información por medio del Pluck en el controlador--}}
                            @foreach ($tipo_documento_id as $descripcion => $id)
                                <option {{old("tipo_documento_id","") == $id ? "selected" : ""}} value="{{ $id }}">{{ $descripcion }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="input-usuarios">
                        <label class="d-block" for="">Genero*</label>
                        <select name="genero" class="form-select" required autofocus>
                            <option>Seleccione una opción</option>
                                <option {{old("genero","") == $id ? "selected" : ""}} value="H">Hombre</option>
                                <option {{old("genero","") == $id ? "selected" : ""}} value="M">Mujer</option>
                        </select>
                    </div>

                    <div class="input-usuarios">
                        <label class="d-block" for="">Correo Electrónico*</label>
                        <input name="email" type="email" value="{{ old("email","")}}" required autofocus>
                    </div>

                    <div class="input-usuarios">
                        <label class="d-block" for="">Municipio*</label>
                        <select name="municipio" id="_departamento" class="form-select" required autofocus></select>
                    </div class="input-usuarios">
                </div>

                <div class="row ancho">
                    <div class="col">
                        <div class="input-usuarios">
                            <label class="d-block" for="">Apellido*</label>
                            <input name="apellido1" type="text" value="{{ old("apellido1","")}}" required autofocus>
                        </div>
                    </div>
                                        
                    <div class="input-usuarios">
                        <label class="d-block" for="">Documento Identificación*</label>
                        <input name="numero_id" type="text" value="{{ old("numero_id","")}}" required autofocus>
                    </div>

                    <div class="col">
                        <div class="input-usuarios">
                            <label class="d-block" class="d-block" for="">Tipo de sangre*</label>
                            <input name="tipo_sangre" type="text" value="{{ old("tipo_sangre","")}}" required autofocus>
                        </div>
                    </div>

                    <div class="input-usuarios">
                        <label class="d-block" for="">Dirección*</label>
                        <input name="direccion" type="text" value="{{ old("direccion","")}}" required autofocus>
                    </div>

                    <div class="input-usuarios">
                        <label class="d-block" class="d-block" for="">Barrio / Sector*</label>
                        <select name="ciudad" id="_municipio"  class="form-select" required autofocus></select>
                    </div>
                </div>
                <button type="submit" class="primario bg-transparent p-1 text-light fw-bold">Guardar y continuar</button>
            </form>
        </div>
    </main>

        <!-- Mensajes: resultado de las validaciones-->
        @if($errors->any())
            @foreach($errors->all() as $e)
                <br>
                <div  class="alert alert-warning error" role="alert">
                    {{ $e }}
                </div>
            @endforeach
        @endif
        <!-- End: mensajes validaciones-->
    
    <footer class="transparente centrar p-1 mt-5 ">
        <p>© 2022 MedByte. Todos los derechos reservados.</p>
    </footer>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa"
        crossorigin="anonymous"></script>
    <script src="../../js/main.js"></script>

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
</body>

</html>