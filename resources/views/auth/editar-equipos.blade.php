<?php 
use Illuminate\Http\Request;
use App\Models\TeamUser;
?> 

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Configurar equipos</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/main.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;600;700&display=swap" rel="stylesheet">

    {{-- Estilos necesarios para las tablas dinámicas--}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.bootstrap4.min.css">


</head>

<body>

    <header>

        <div class="d-flex barra justify-content-xxl-evenly align-items-center ">

            <div class="ancho">
                <img src="../../img/logo-medbyte.png" alt="">
            </div>

            <div class="ancho">
                <nav class="flex gap-2">
                    <a href="" class="text-light">Inicio</a>
                    <a href="" class="text-light">Soluciones</a>
                    <a href="" class="text-light">Recursos</a>
                    <a href="" class="text-light">Precios</a>
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
                    <button type="button" class="btn  primario">Iniciar sesión</button>
                    <button type="button" class="btn primario">Crea tu cuenta</button>
                </div>
                <span><i class="bi bi-person-circle fs-3 texto-primario"></i></span>
            </div>
        </div>
    </header>

    <main class="container mt-3 ">
        <h3>Configuracion de equipo.</h3>

        @if (session('status'))
            <div class="alert alert-success" role="alert">
                <h4 class="alert-heading">¡Bien hecho!</h4>
                <p>{{ session('status') }}</p>
                <hr>
            </div>
            <br>
        @endif

        <table id="datatable-equipos" class="tabla-equipos mt-3">
            <thead>
                <tr>
                    <th>Nombre equipo</th>
                    <th>Usuarios</th>
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
                    <td>{{ $p->description }}</td>
                    <td>{{ $i->numeroEquipos }}</td>
                </tr>
                    @endif
                    @endforeach
                @endforeach
                @endif
            </tbody>
        </table>

        <hr width="100%">
        <div>
            <div class="w-100 d-flex justify-content-between mt-4 align-items-center">
                <div>
                </div>
                <div class="d-flex gap-2  ">
                    <div class="boton-enviar">
                        <button id="abrirmodal" class="text-light bg-transparent border-0 fw-bold">Añadir</button>
                        <i class="bi bi-plus-circle text-light"></i>

                    </div>
                </div>
            </div>
        </div>

        {{-- Se muestran los usuarios que pertenecen a ese equipo. --}}
        <div class="mt-3">
            <table class="tabla-lista-equipos" id="datatable-usuarios">
                <thead>
                    <tr>
                        <th>Usuarios asignados</th>
                        <th>Perfil</th>
                    </tr>

                </thead>
                {{-- Lista de usuarios que pertenecen a ese equipo--}}
                <tbody>
                    @if (count($UsersTeam)<=0)
                        <tr>
                            <td colspan="7" >No hay usuarios asignados.</td>
                        <tr>
                    @else
                    @foreach ($UsersTeam as $i)
                    <tr>
                        <td>{{ $i->nombre1 }} {{ $i->nombre2 }} {{ $i->apellido1 }} {{ $i->apellido2 }} </td>
                        {{-- Se debe poner el perfil del usuario medico, enfermera....--}}
                        <td>Empleado</td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
        </div>

        <form action="{{ route('TeamEmpresa.update',$TeamEmpresa->id) }}" method='POST' >
            @csrf
            @method("PUT")
            <div class="modal-container" id="modal_container">
                <div class="modal-contenido border">
                    <div class="modal-titulo container">
                        <p>Listado de funcionarios</p>
                    </div>
                    <div class="border buscar px-1 container mt-2">
                        <input type="text" class="bg-transparent border-0 " placeholder="Buscar">
                        <i class="bi bi-search"></i>
                    </div>

                    <div class="container  mt-3 ">
                        <div class="modal-tabla ">
                            {{-- 
                                Se realiza un for con la cantidad de usuarios que pertenecen al equipo,
                                Realiza una consulta, preguntando si ese usuario se encuentra en ese equipo.
                                Si el usuario se encuentra hace el checked, sino lo deja en blanco.
                            --}}
                            <table>
                                @for ($i = 0; $i < count($users); $i++)
                                <?php 
                                    $data = TeamUser::select('*')->where([
                                        ['id_team', '=', $TeamEmpresa->id ],
                                        ['id_user', '=', $users[$i]['id']]
                                    ])->count(); 
                                ?>
                                @if ($data == 0)
                                <div class="">
                                    <input id="equipos" name="equipo[]" value={{$users[$i]['id']}} type="checkbox">
                                    <label for="">{{$users[$i]['nombre1']}} {{$users[$i]['nombre2']}} {{$users[$i]['apellido1']}} {{$users[$i]['apellido2']}}</label>
                                </div>
                                @else
                                <div class="">
                                    <input id="equipos" name="equipo[]" value={{$users[$i]['id']}} type="checkbox" checked>
                                    <label for="">{{$users[$i]['nombre1']}} {{$users[$i]['nombre2']}} {{$users[$i]['apellido1']}} {{$users[$i]['apellido2']}}</label>
                                </div>
                                @endif
                                @endfor
                            </table>
                        </div>

                        <div class="d-flex gap-2 justify-content-end mt-3 p-2 ">
                            <button id="cerrarmodal" class="boton-enviar">Cancelar</button>
                            <button type="submit" class="boton-enviar">Guardar</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa"
        crossorigin="anonymous"></script>
    <script src="../../js/main.js"></script>
    <script src="../../js/modal.js"></script>

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
    <script>$('#datatable-usuarios').DataTable({
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

<!-- Elaborado por Harold Palacios 31/08/2022 -->