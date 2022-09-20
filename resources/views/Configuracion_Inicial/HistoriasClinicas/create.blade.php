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
        <h1>Creación de historias clinicas.</h1>

        <div>
            <h3>Historias Clinicas</h3>
        </div>

        <div>
            <form method="POST" action="{{ route('HistoriaClinica.store') }}" class="d-flex gap-5" enctype="multipart/form-data">
                @csrf
                <div class="row  ancho">
                    <div class="col">
                        <div class="input-usuarios">
                            <label class="d-block " for="">Descripción*</label>
                            <input name="nombre1" type="text" value="{{ old("nombre1","")}}">
                        </div>

                        <div class="input-usuarios">
                            <label class="d-block" for="">Paciente asociado*</label>
                            <select name="tipo_paciente_id" class="form-select">
                                <option>Seleccione una opción</option>
                                @for ($i = 0; $i < count($Pacientes); $i++)
                                <option {{old("tipo_paciente_id","") == $Pacientes[$i]['id'] ? "selected" : ""}} value="{{ $Pacientes[$i]['id'] }}">{{  $Pacientes[$i]['nombre1']." ".$Pacientes[$i]['nombre2']." ".$Pacientes[$i]['apellido1']." ".$Pacientes[$i]['apellido2'] }}</option>
                                @endfor
                            </select>
                        </div>

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
</body>

</html>