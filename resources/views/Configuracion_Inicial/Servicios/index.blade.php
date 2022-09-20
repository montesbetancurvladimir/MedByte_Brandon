<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Servicios</title>
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
        <div>

            <h3 class="mt-4">configuración de permisos por usuario</h3>
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
                <a href="{{  url('Permisos/index') }}"><canvas id="circulo" width="32" height="32"></canvas></a>
            </div>
            <hr width="200px" height="100px">
            <div>
                <a href="{{  url('Servicios/index') }}"><canvas id="circulo" width="32" height="32"></canvas></a>
            </div>
            <hr width="200px" height="100px">
            <div>
                <a href="{{  url('Pacientes/index') }}"><canvas id="circulo-vacio" width="32" height="32"></canvas></a>
            </div>
        </div>

        <!-- inicia pantalla de servicios -->

        <div class="content mb-5">
            <div>
                <p class="mt-2">*Crea y configura los permisos de usuarios.
                    <span class="texto-primario">Más informacion acerca de permisos de usuario.</span>
                </p>

                <div class="w-100 d-flex justify-content-between mt-4 align-items-center">
                    <div>
                        <div class="border px-3 py-1">
                            <input type="text" class="bg-transparent border-0 text-light">
                            <i class="bi bi-search"></i>
                        </div>

                    </div>
                    <div class="primario boton-transparente  boton-equipos ">                        
                        <a href="{{ url("Servicios/create") }}" value="Crear servicio" class="bg-transparent border-0 text-light fw-bold">
                            <i class="bi bi-plus-circle text-light"></i>  Crear Servicio
                        </a>
                    </div>

                </div>

                <div class="mt-3">
                    <table>
                        <thead>
                            <tr>
                                <th>Servicios / Especialidad </th>
                                <th>Duracion</th>
                                <th>Personalizar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($Servicios)<=0)
                                <tr>
                                    <td colspan="7" >No hay registros.</td>
                                <tr>
                            @else
                            @foreach ($Servicios as $p)
                            <tr>
                                <td>{{ $p->nombre_servicio }}</td>
                                <td>{{ $p->duracion }} min</td>
                                <td>
                                    <a href="{{ route("Servicios.edit",$p) }}"  class="primario bg-transparent text-light fw-bold">
                                        Editar
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>

    <footer class="transparente centrar p-3 mt-5 ">
        <p>© 2022 MedByte. Todos los derechos reservados.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa"
        crossorigin="anonymous"></script>
    <script src="../../js/main.js"></script>
</body>

</html>