<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sedes</title>
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
            <h3 class="mt-4"><span class="texto-primario fw-bold">!Bienvenido a Medbyte¡</span> configuremos tu cuenta.
            </h3>
            <h3 class="mt-3">Configuración de sucursales.</h3>
        </div>

        <div class="linea mt-5">
            <div>
                <a href="{{  url('Sucursales/index') }}"><canvas id="circulo" width="32" height="32"></canvas></a>
            </div>
            <hr width="200px" height="100px">
            <div>
                <a href="{{  url('User/index') }}"><canvas id="circulo-vacio" width="32" height="32"></canvas></a>
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


        <!-- inicia pantalla de servicios -->

        <div class="content mb-5">
            <div>
                <p class="mt-3">*Crea nuevas sedes, personaliza los datos de tu sede para prestación del servicio.
                    <span class="texto-primario">Más informacion acerca de sedes.</span>
                </p>

                <div class="w-100 d-flex justify-content-between mt-4 align-items-center">
                    <div class="d-flex gap-3">
                        <div class="primario boton-transparente  boton-equipos ">                        
                            <a href="{{ url("Sucursales/create") }}" value="Crear servicio" class="bg-transparent border-0 text-light fw-bold">
                                Crear Una Nueva Sede <i class="bi bi-plus-circle text-light"></i>  
                            </a>
                        </div>
                    </div>
                </div>

                <div class="mt-3">
                    <table id="datatable">
                        <thead>
                            <tr>
                                <th>Nombre Sede </th>
                                <th>Direccion</th>
                                <th>Teléfono</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($Sucursales)<=0)
                                <tr>
                                    <td colspan="7" >No hay registros.</td>
                                <tr>
                            @else
                            @foreach ($Sucursales as $p)
                            <tr>
                                <td>{{ $p->descripcion }}</td>
                                <td>{{ $p->direccion }}</td>
                                <td>{{ $p->telefono}}</td>
                                @if ( $p->estado_sede == 1)
                                    <td>Activo</td> 
                                @else
                                    <td>Inactivo</td> 
                                @endif
                                <td>
                                    <div class="d-flex gap-3 align-items-center justify-content-center">
                                        <a href="{{ route("Sucursales.edit",$p) }}" class="primario boton-transparente  boton-equipos text-light fw-bold ">
                                            Editar
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>


            </div>



        </div>

        <div class="d-flex justify-content-end gap-2 mt-3">
            <a href="usuarios.html" class="boton-transparente fw-bold ">Cancelar</a>
            <a href="configuracion-pacientes.html" class="boton-transparente fw-bold ">Guardar</a>
        </div>



    </main>

    <footer class="transparente centrar p-3 mt-5 ">
        <p>© 2022 MedByte. Todos los derechos reservados.</p>
    </footer>

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
</body>

</html>