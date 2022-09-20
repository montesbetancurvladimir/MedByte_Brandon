<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="../../css/main.css">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;600;700&display=swap" rel="stylesheet">

    {{-- Estilos necesarios para las tablas dinámicas--}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.bootstrap4.min.css">


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
        <div>
            <h3 class="mt-4"><span class="texto-primario fw-bold">¡Bienvenido a Medbyte!</span> configuremos tu cuenta.</h3>
        </div>

        <div class="linea mt-5">
            <div>
                <a href="{{  url('Sucursales/index') }}"><canvas id="circulo" width="32" height="32"></canvas></a>
            </div>
            <hr width="200px" height="100px">
            <div>
                <a href="{{  url('User/index') }}"><canvas id="circulo" width="32" height="32"></canvas></a>
            </div>
            <hr width="200px" height="100px">
            <div>
                {{-- <canvas id="circulo-vacio" width="32" height="32"></canvas>--}}
                <a href="{{  url('Permisos/index') }}"><canvas id="circulo-vacio" width="32" height="32"></canvas></a>
            </div>
            <hr width="200px" height="100px">
            <div>
                <a href="{{  url('Servicios/index') }}"><canvas id="circulo-vacio" width="32" height="32"></canvas></a>
            </div>
            <hr width="200px" height="100px">
            <div>
                <a href="{{  url('Pacientes/index') }}"><canvas id="circulo-vacio" width="32" height="32"></canvas></a>
            </div>
        </div>

        <div class="mt-5">
            <div class="btn-group m-0" role="group" aria-label="Basic example">
                <button type="button" class="boton border fs-4" data-target="#usuarios">Usuarios</button>
                <button type="button" class="boton border fs-4" data-target="#equipos">Equipos</button>
            </div>
            <hr width="100%" class="m-0">
        </div>
        <!-- inicia pantalla usuarios -->

        <div class="content mb-5">
            <div data-content id="usuarios">
                <p class="mt-2">Crea nuevos usuarios, personaliza permisos de usuario y elimina usuarios de tu cuenta.
                    <span class="texto-primario">Más informacion acerca de permisos de usuario.</span>
                </p>

                @if (session('status'))
                <div class="alert alert-success" role="alert">
                    <h4 class="alert-heading">¡Bien hecho!</h4>
                    <p>{{ session('status') }}</p>
                    <hr>
                </div>
                <br>
                @endif

                <div class="w-100 d-flex justify-content-between mt-4 align-items-center">
                    <div></div>
                    <div>
                        <a href="{{ route("User.plantilla") }}" class="primario bg-transparent p-1 text-light fw-bold" title="Crear usuarios">
                            Importar usuarios.
                        </a>
                        <a href="{{ route("User.create") }}" class="primario bg-transparent p-1 text-light fw-bold" title="Crear usuarios">
                            Crear usuarios.
                        </a>
                    </div>
                </div>
                <h1>Configuracion de usuarios.</h1>
                <div class="mt-5">
                    <table id="datatable">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nombre completo</th>
                                <th>Email</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($users as $p)
                        <tr>
                            <th scope="row">{{ $p->id }}</th>
                            <td>{{ $p->nombre1 }} {{ $p->nombre2 }} {{ $p->apellido1 }} {{ $p->apellido2 }}</td>
                            <td>{{ $p->email }}</td>
                            <td>
                                <a href="{{ route("User.edit",$p) }}" class="primario bg-transparent p-1 text-light fw-bold" title="Asignar equipo">
                                    Editar.
                                </a>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="d-flex gap-5 mt-5 fw-bold">
                    <div class="primario  p-2 centrar">
                        <p>Usuarios registrados: <span>2</span></p>
                    </div>
                    <div class="primario p-2  centrar">
                        <p>Te faltan por registrar: <span>3</span></p>
                    </div>
                </div>
            </div>

            <!-- inicia pantalla EQUIPOS -->
            <div data-content id="equipos">
                @if (session('status'))
                <br>
                <div class="alert alert-success" role="alert">
                    <h4 class="alert-heading">¡Bien hecho!</h4>
                    <p>{{ session('status') }}</p>
                    <hr>
                </div>
                <br>
                @endif

                <div class="w-100 d-flex justify-content-between mt-4 align-items-center">
                    <div>
                        <div>
                        </div>
                    </div>
                    <div>
                        <a href="{{ route("TeamEmpresa.plantilla") }}" class="primario bg-transparent p-1 text-light fw-bold" title="Importar equipos.">
                            Importar equipos.
                        </a>
                        <a href="{{ route("User.create_equipos") }}" class="primario bg-transparent p-1 text-light fw-bold" title="Crear equipos.">
                            Crear equipos.
                        </a>
                    </div>
                </div>

                <br>
                <h1>Configuracion de equipos.</h1>

                <div class="mt-5">
                    <table id="datatable-equipos">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>N. Usuarios</th>
                                <th>Area</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($equipos)<=0)
                            <tr>
                                <td colspan="7" >No hay registros.</td>
                            <tr>
                            @else
                            @foreach ($equipos as $p)
                                @foreach($cantidad_equipos as $i)
                                @if($i->id_team == $p->id)
                                <tr>
                                    <td>{{ $p->id }}</td>
                                    <td>{{ $i->numeroEquipos }}</td>
                                    <td>{{ $p->description }}</td>
                                    <td>
                                        <a href="{{ route("TeamEmpresa.edit",$p) }}" class="primario bg-transparent p-1 text-light fw-bold" title="Editar usuario.">Editar</a>
                                    </td>
                                </tr>
                                @endif
                                @endforeach
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa"
        crossorigin="anonymous"></script>
    <script src="../../js/main.js"></script>


    {{-- Clases necesarias para el datatable--}}
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.3.0/js/responsive.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>
    <script>$('#datatable').DataTable({
        responsive: true,
        autoWidth: false,
        "language": {
                "lengthMenu": "Mostrar "+ 
                                        `<select class="custom-select custom-select-sm form-control form-control-sm">
                                            <option value='10' >10</option>
                                            <option value='25' >25</option>
                                            <option value='50' >50</option>
                                            <option value='100' >100</option>
                                            <option value='-1' >All</option>
                                        </select>`
                                        +" registros por página.",
                "zeroRecords": "Nada encontrado - disculpa.",
                "info": "Mostrando la página _PAGE_ de _PAGES_",
                "infoEmpty": "No records available.",
                "infoFiltered": "(filtrado de _MAX_ registros totales.)",
                "search": "Buscar:",
                "paginate":{
                    'next' : 'Siguiente',
                    'previous' : 'Anterior'
                }
            }
    });</script>
    <script>$('#datatable-equipos').DataTable({
        responsive: true,
        autoWidth: false,
        "language": {
                "lengthMenu": "Mostrar "+ 
                                        `<select class="custom-select custom-select-sm form-control form-control-sm">
                                            <option value='10' >10</option>
                                            <option value='25' >25</option>
                                            <option value='50' >50</option>
                                            <option value='100' >100</option>
                                            <option value='-1' >All</option>
                                        </select>`
                                        +" registros por página.",
                "zeroRecords": "Nada encontrado - disculpa.",
                "info": "Mostrando la página _PAGE_ de _PAGES_",
                "infoEmpty": "No records available.",
                "infoFiltered": "(filtrado de _MAX_ registros totales.)",
                "search": "Buscar:",
                "paginate":{
                    'next' : 'Siguiente',
                    'previous' : 'Anterior'
                }
            }
    });</script>

</body>

</html>