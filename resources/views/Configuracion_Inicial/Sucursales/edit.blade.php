<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- Token select triple--}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Crear Sedes</title>
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
        <h3 class="mt-5">Configuracion de tus sedes.</h3>

        <div class="modal-titulo mt-4 p-1">
            <h3>Datos de la sede.</h3>
        </div>

        <div class="mt-4">
            <p>¿Cuantas sedes tienes? </p>
            <div>
                <div class="d-flex  gap-2">
                    <input type="submit" value="Una Sede" class=" boton-transparente fw-bold">
                    <a href="#" class="boton-transparente fw-bold ">Multiples Sedes</a>
                </div>

            </div>
        </div>

        <div class="mt-3">
            <form method="POST" action="{{ route('Sucursales.update',$SucursalEmpresa->id) }}" class="d-flex gap-5" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="d-flex gap-5">

                    <div class="row  ancho">
                        <div class="col">
                            <div class="input-usuarios">
                                <label class="d-block " for="">Nombre Sede*</label>
                                <input type="text" name="descripcion" value="{{ $SucursalEmpresa->descripcion }}" required autofocus>
                            </div>
                            <div class="input-usuarios">
                                <label class="d-block" class="d-block" for="">Barrio / Sector*</label>
                                <select name="tipo_ciudad_id" id="_municipio" class="form-select" required autofocus>
                                    <option value="">Seleccione una opción.</option>
                                    @foreach ($municipios as $item)
                                    <option {{$SucursalEmpresa->ciudad == $item->id ?  'selected' : ''}} value="{{$item->id}}">{{$item->descripcion}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="input-usuarios">
                                <label class="d-block" class="d-block " for="">Tipo de documento</label>
                                <select name="tipo_documento" id="" class="text-light text-center mt-1 w-100" required autofocus>
                                    <option  {{$SucursalEmpresa->tipo_documento == "Cedula de ciudadania" ?  'selected' : ''}} value="Cedula de ciudadania">Cedula de ciudadania</option>
                                    <option  {{$SucursalEmpresa->tipo_documento == "Cedula de Extranjeria" ?  'selected' : ''}} value="Cedula de Extranjeria">Cedula de Extranjeria</option>
                                    <option  {{$SucursalEmpresa->tipo_documento == "NIT" ?  'selected' : ''}} value="NIT">NIT</option>
                                </select>
                            </div>
 
                           
                            <div class="d-flex gap-3 mt-5">
                                <label class="d-block" class="d-block " for="">Estado sede:</label>
                                <div class="d-flex gap-2">
                                    <input {{$SucursalEmpresa->estado_sede == "1" ?  'checked' : ''}} type="radio" name="estado_sede" value="1"> Activo
                                    <input {{$SucursalEmpresa->estado_sede == "0" ?  'checked' : ''}} type="radio" name="estado_sede" value="0"> Inactivo
                                </div>
                              
                            </div>

                            <div class="d-flex gap-3 mt-3">
                                <label class="d-block" class="d-block " for="">Tipo de sede:</label>
                                <div class="d-flex gap-2">
                                    <input {{$SucursalEmpresa->tipo_sede == "1" ?  'checked' : ''}} type="radio" name="tipo_sede" value="1"> Principal
                                    <input {{$SucursalEmpresa->tipo_sede == "0" ?  'checked' : ''}} type="radio" name="tipo_sede" value="0"> Otra
                                </div>
                              
                            </div>
                        </div>


                    </div>
                    <div class="row ancho">
                        <div class="col">
                            <div class="input-usuarios">
                                <label class="d-block" for="">País*</label>
                                <select name="tipo_pais_id" id="_pais" class="form-select" required autofocus>
                                    <option value="">Seleccione una opción.</option>
                                    @foreach ($paises as $item)
                                    <option {{$SucursalEmpresa->pais == $item->id ?  'selected' : ''}} value="{{$item->id}}">{{$item->descripcion}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="input-usuarios">
                                <label class="d-block" for="" >Direccion*</label>
                                <input type="text" name="direccion"  value="{{ $SucursalEmpresa->direccion }}" required autofocus>
                            </div>

                            <div class="input-usuarios">
                                <label class="d-block" for="" name="documento">N° Documento*</label>
                                <input type="text" name="documento"  value="{{ $SucursalEmpresa->documento }}" required autofocus>
                            </div>

                            <div class="input-usuarios">
                                <label class="d-block" for="">Cargar logo de la empresa</label>
                                <input name="logo" type="file">
                            </div>
                        </div>
                    </div>

                    <div class="row ancho">
                        <div class="col">

                            <div class="input-usuarios">
                                <label class="d-block" for="">Municipio*</label>
                                <select name="tipo_departamento_id" id="_departamento" class="form-select" required autofocus>
                                    @foreach ($departamentos as $item)
                                    <option {{$SucursalEmpresa->municipio == $item->id ?  'selected' : ''}} value="{{$item->id}}">{{$item->descripcion}}</option>
                                    @endforeach
                                </select>
                            </div class="input-usuarios">

                            <div class="input-usuarios">
                                <label class="d-block" for="">Telefono*</label>
                                <input type="text" name="telefono" value="{{ $SucursalEmpresa->telefono }}" required autofocus>
                            </div class="input-usuarios">

                            <div class="input-usuarios">
                                <label class="d-block" for="">Razon social*</label>
                                <input type="text" name="razon_social"  value="{{ $SucursalEmpresa->razon_social }}" required autofocus>
                            </div class="input-usuarios">

                            <div class="input-usuarios">
                                <label class="d-block" for="">Cargar foto de la sede</label>
                                <input name="sede" type="file">
                            </div>

                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-end gap-2 mt-5">
                    <button type="submit" class=" boton-transparente fw-bold">Guardar</button>
                </div>
            </form>
        </div>

    </main>

    <footer class="transparente centrar p-3 mt-5 ">
        <p>© 2022 MedByte. Todos los derechos reservados.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa"
        crossorigin="anonymous"></script>
    <script src="../../js/main.js"></script>

    {{-- Script Select triple--}}
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