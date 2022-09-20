<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;600;700&display=swap" rel="stylesheet">
</head>

<body>

    <div class="d-flex barra justify-content-around align-items-center ">

        <div>
            <img src="img/logo-medbyte.png" alt="">
        </div>

        <div>
            <nav>
                <a href="" class="text-light">Inicio</a>
                <a href="" class="text-light">Soluciones</a>
                <a href="" class="text-light">Recursos</a>
                <a href="" class="text-light">Precios</a>
            </nav>
        </div>

        <div class="d-flex align-items-center gap-2">
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

    <!-- AQUI VA LA PARTE DEL LOGIN -->

    <div class=" d-flex justify-content-center align-items-center mt-5  ">
        <div>
            <div class="d-flex flex-column align-items-center border tarjeta rounded-4 border-3 border-light ">
                <div>
                    <img src="img/Robodoc.png" alt="">
                </div>
                <h2 class="texto-primario fw-bold">iniciar sesión</h2>
                <!-- Inicio DEL FORMULARIO -->
                <form method="POST" action="{{ route('login') }}"  class="d-flex flex-column gap-2">
                        @csrf
            
                    <!-- AQUI ESTA EL INPUT DE USUARIO DEL FORMULARIO -->
                    <div class="border-0 px-2 rounded transparente"><span> <i class="bi bi-person-circle fs-3"></i>
                        </span><input type="text" id="email" name="email" placeholder="Usuario"
                            class="bg-transparent border-0 text-light">
                    </div>
                    <!-- AQUI ESTA EL INPUT DE CONTRASEÑA DEL FORMULARIO -->
                    <div class="border-0 px-2 rounded transparente"><span> <i class="bi bi-lock-fill fs-3"></i>
                        </span><input type="password" id="password" name="password" placeholder="********"
                            class="bg-transparent border-0 text-light ">
                    </div>

                    <div class="d-flex align-items-center gap-2 mt-4 mb-2 ">
                        <button class="rds px-4 py-1 rounded-pill border-0 "> <i class="bi bi-google google"></i>
                        </button>
                        <button class="rds px-4 py-1 rounded-pill border-0 "> <i class="bi bi-facebook facebook"></i>
                        </button>
                    </div>
                    <div class="p-1 mb-2  recordar">
                        <input type="checkbox" name="recordar" id="recordar"> <label for="recordar" class="recordar">Recordarme</label>
                        <a href="" class="olvide-contra texto-primario recordar">Olvide mi contraseña</a>
                    </div>

                    <input type="submit" class="rounded-pill border-0 p-1 fw-bold" value="Login">
                    <!-- Boton de envio -->
                </form>
                <!-- FIN DEL FORMULARIO -->
            </div>

        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa"
        crossorigin="anonymous"></script>
</body>

</html>

<!-- Elaborado por Harold Palacios 31/08/2022 -->