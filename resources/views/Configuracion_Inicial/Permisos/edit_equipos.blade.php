<?php 
use Illuminate\Http\Request;
use App\Models\ProfileTeam;
?>

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

    <main class="container">
        <div>
            <h3 class="mt-3">configuración de permisos por usuario</h3>
            <p class="mt-2">*Crea y configura los permisos de usuarios.
                <span class="texto-primario">Más informacion acerca de permisos de usuario.</span>
            </p>
        </div>

        <div>
            <div>
                <form action="{{route('Permisos.update_team',$TeamEmpresa->id)}}" method="POST" class="d-flex gap-5 mt-5">
                    @csrf
                    @method('PUT')
                    <div class="row ancho">
                        <div class="col d-flex flex-column gap-4">
                            @for ($i = 0; $i < $count_total_permisos; $i++)
                                <?php 
                                    $data = ProfileTeam::select('*')->where([
                                        ['profile_team_type_id', '=',  $TiposPermisos[$i]['id']],
                                        ['team_id', '=', $TeamEmpresa->id]
                                    ])->count(); 
                                ?>
                                @if ($data == 0)
                                <div class="">
                                    <input name="permiso[]" value={{$TiposPermisos[$i]['id']}} type="checkbox">
                                    <label for="">{{$TiposPermisos[$i]['description']}}</label>
                                </div>
                                @else
                                <div class="">
                                    <input name="permiso[]" value={{$TiposPermisos[$i]['id']}} type="checkbox" checked>
                                    <label for="">{{$TiposPermisos[$i]['description']}}</label>
                                </div>
                                @endif
                            @endfor
                        </div>
                    </div>
                    <button type="submit" class="primario bg-transparent p-1 text-light fw-bold" >Guardar</button>
                </form>
            </div>
        </div>
        <div class="mt-5">
            <table>
                <thead>
                    <tr>
                        <th>Nombre</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    </tr>
                    <td>{{ $TeamEmpresa->description }}</td>
                </tbody>
            </table>
        </div>
    </main>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa"
        crossorigin="anonymous"></script>
    <script src="../../js/main.js"></script>
</body>

</html>