<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear servicios</title>
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
        <h3 class="mt-4 fw-bold">Configuracion de servicios</h3>

        <div class="modal-titulo mt-3">
            <h3>Datos de servicio</h3>
        </div>

        <div class="mt-4">
            <form action="{{route('Servicios.store')}}" method="POST" class="d-flex gap-5 mt-5">
                @csrf
                <div class=" d-flex gap-5 align-items-center">
                    <div class="input-usuarios">
                        <label class="d-block" for="">Nombre Del Servicio</label>
                        <input type="text" class="p-2" name="nombre_servicio">
                    </div>
                    <div class="input-usuarios">
                        <label class="d-block" for="">Duración</label>
                        <select class="py-2 px-4" name="duracion">
                            <option value="10">10 min</option>
                            <option value="20">20 min</option>
                            <option value="35">35 min</option>
                            <option value="40">40 min</option>
                            <option value="50">50 min</option>
                            <option value="60">60 min</option>
                            <option value="70">70 min</option>
                            <option value="80">80 min</option>
                            <option value="90">90 min</option>
                            <option value="100">100 min</option>
                            <option value="110">110 min</option>
                            <option value="120">120 min</option>
                        </select>
                    </div>
                    <div class="input-usuarios">
                        <label class="d-block" for="">Sede</label>
                        <select name="sucursal" class="d-block">
                            <option>Seleccione una opción</option>
                            @for ($i = 0; $i < count($sucursales); $i++)
                            <option {{old("sucursal","") == $sucursales[$i]['id'] ? "selected" : ""}} value="{{ $sucursales[$i]['id'] }}">{{  $sucursales[$i]['descripcion'] }}</option>
                            @endfor
                        </select>
                    </div>
                </div>
                <div class="d-flex gap-2 justify-content-end  ">
                    <div class="d-flex gap-2  ">
                        <div class="primario boton-transparente  boton-equipos ">
                            <button id="abrirmodal" value="Añadir" class="bg-transparent border-0 text-light fw-bold">
                                Añadir </button>
                            <i class="bi bi-plus-circle text-light"></i>

                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-end">
                    <button type="submit" class="boton-enviar">Guardar y continuar</button>
                </div>

                <!-- MODAL DE CREAR Servicio -->
                <div class="modal-container  modal-equipos" id="modal_container">
                    <div class="modal-contenido border w-75">
                        <div class="modal-titulo container">
                            <p>Listado de funcionarios</p>
                        </div>


                        <div class="container mt-3 d-flex gap-5 justify-content-center">

                            <div class="w-50">
                                <p class="texto-primario">Profesionales</p>
                                <div class="border buscar px-1 ">
                                    <input type="text" class="bg-transparent border-0 " placeholder="Buscar">
                                    <i class="bi bi-search"></i>
                                </div>

                                <div class="modal-tabla mt-2 ">
                                    <table>
                                        @foreach ($users as $p)
                                        <tr>
                                            <td>
                                                <input id="usuarios" name="usuarios[]" class="form-check-input" type="checkbox" value="{{$p->id}}">
                                                <label class="form-check-label">{{ $p->nombre1 }} {{ $p->nombre2 }} {{ $p->apellido1 }} {{ $p->apellido2 }}</label><br>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </table>
                                </div>
                            </div>


                            <!-- TABLA 2 -->
                            <div class="w-50">
                                <div class="modal-tabla mt-2 ">
                                    <p class="texto-primario">Equipos</p>
                                    <div class="border buscar px-1  mt-2">
                                        <input type="text" class="bg-transparent border-0 " placeholder="Buscar">
                                        <i class="bi bi-search"></i>
                                    </div>
                                    <table class=" ">
                                        @foreach ($equipos as $s)
                                        <tr>
                                            <td>
                                                <input id="equipos" name="equipos[]" class="form-check-input" type="checkbox" value="{{$s->id}}">
                                                <label class="form-check-label">{{ $s->description }}</label><br>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </table>
                                </div>

                            </div>



                        </div>
                        <div class="d-flex gap-2 justify-content-end mt-3 p-2 ">
                            <button id="cerrarmodal" class="boton-enviar">Guardar</button>
                            {{-- No funciona el cerrar.--}}
                            {{-- <button id="cerrarmodal" class="boton-enviar">Cancelar</button> --}}
                        </div>
                    </div>
                </div>
                <!-- fIN MODAL -->

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
    <script src="../../js/modal.js"></script>
</body>

</html>