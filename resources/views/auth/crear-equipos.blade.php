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

    <main class="container mt-3 ">
        <h3>Configuracion de equipo.</h3>

        <form action="{{ route('User.store_equipos') }}" method='POST' >
            @csrf
            <div class="form-group input-usuarios">
                <label>Nombre del equipo*</label>
                <input required autofocus type="text" class="form-control" name="nombre_equipo" placeholder="Ingrese el nombre del equipo." value="{{ old("nombre_equipo","")}}">
            </div>
            <div class="mt-3"> 
                <table class="tabla-lista-equipos">
                    <thead>
                        <tr>
                            <th>Lista de usuarios</th>
                            <th>Perfil</th>
                        </tr>
    
                    </thead>
                    <tbody class="text-start">
                        @foreach ($users as $p)
                        <tr>
                            <td>
                                <input id="equipos" name="equipo[]" class="form-check-input" type="checkbox" value="{{$p->id}}">
                                <label class="form-check-label">{{ $p->nombre1 }} {{ $p->nombre2 }} {{ $p->apellido1 }} {{ $p->apellido2 }}</label><br>
                            </td>
                            <td>Medico</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <br>
            </div>
            <button type="submit" class="primario bg-transparent p-2 text-light">Añadir</button>
        </form>

        <table class="tabla-equipos mt-3">
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
        <br>
    </main>


    {{--
    <main class="container">
        <div>
           <h3 class="mt-3">configuración de permisos por usuario</h3>
           <p class="mt-2">*Crea y configura los permisos de usuarios. 
            <span class="texto-primario">Más informacion acerca de permisos de usuario.</span>
        </p>
        </div>

        <div>
            <div>
                <form method="POST" action="{{ route('User.store_equipos') }}" class="d-flex gap-5">
                    @csrf
                    <div class="row ancho">
                        <div class="col d-flex flex-column gap-4">

                            <div class="">
                                <label class="d-block " for="">Nombre del equipo</label>
                                <input name="description" type="text" class="input-usuarios">
                            </div>
                    </div>

                    <button type="submit" class="btn btn-primary btn-lg btn-block">Guardar y continuar</button>
                </form>
            </div>
        </div>
    </main>
    --}}



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

    
    {{--<footer class="transparente centrar p-1 mt-5 ">
        <p>© 2022 MedByte. Todos los derechos reservados.</p>
    </footer>--}}

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa"
        crossorigin="anonymous"></script>
    <script src="../../js/main.js"></script>
</body>

</html>