<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Horario Medico</title>
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

        <h3 class="mt-3">Configuracion del agendamiento</h3>

        <div class="linea mt-5">
            <div>
                <a href="{{  url('Agendamiento/instituciones') }}"><canvas id="circulo" width="32" height="32"></canvas></a>
            </div>
            <hr width="200px" height="100px">
            <div>
                <a href="{{  url('Agendamiento/medicos') }}"><canvas id="circulo-vacio" width="32" height="32"></canvas></a>
            </div>
            <hr width="200px" height="100px">
            <div>
                <a href="{{  url('Canales/index') }}"><canvas id="circulo-vacio" width="32" height="32"></canvas></a>
            </div>
        </div>

        <div class="transparente">
            <h3>Horarios Instituciones</h3>
        </div>

        <p>Establece las horas predeterminadas en las que tu y tu equipo esten disponibles para tomar citas.</p>
        <div>
            <form method="POST" action="{{ route('Instituciones.update',$InstitucionAgendamiento->id) }}" class="d-flex gap-5">
                @csrf
                @method('PUT')
                <div class="d-flex gap-2 align-items-center">

                    <div class="d-flex flex-column gap-3">
                        <div>
                            <input type="checkbox" name="lunes" id="" {{$InstitucionAgendamiento->lunes == "Abierto" ?  'checked' : ''}}>
                            <label for="">Lunes</label>
                        </div>
                        <div>
                            <input type="checkbox" name="martes" id="" {{$InstitucionAgendamiento->martes == "Abierto" ?  'checked' : ''}}>
                            <label for="">Martes</label>
                        </div>
                        <div>
                            <input type="checkbox" name="miercoles" id="" {{$InstitucionAgendamiento->miercoles == "Abierto" ?  'checked' : ''}}>
                            <label for="">Miercoles</label>
                        </div>
                        <div>
                            <input type="checkbox" name="jueves" id="" {{$InstitucionAgendamiento->jueves == "Abierto" ?  'checked' : ''}}>
                            <label for="">Jueves</label>
                        </div>
                        <div>
                            <input type="checkbox" name="viernes" id="" {{$InstitucionAgendamiento->viernes == "Abierto" ?  'checked' : ''}}>
                            <label for="">Viernes</label>
                        </div>
                        <div>
                            <input type="checkbox" name="sabado" id="" {{$InstitucionAgendamiento->sabado == "Abierto" ?  'checked' : ''}}>
                            <label for="">Sabado</label>
                        </div>
                        <div>
                            <input type="checkbox" name="domingo" id="" {{$InstitucionAgendamiento->domingo == "Abierto" ?  'checked' : ''}}>
                            <label for="">Domingo</label>
                        </div>
                    </div>

                    <div class="d-flex flex-column gap-3">
                        <div>
                            <select name="lunes_open">
                                <option {{$InstitucionAgendamiento->lunes_open == "6:00" ?  'selected' : ''}} value="6:00">6:00</option>
                                <option {{$InstitucionAgendamiento->lunes_open == "6:30" ?  'selected' : ''}} value="6:30">6:30</option>
                                <option {{$InstitucionAgendamiento->lunes_open == "7:00" ?  'selected' : ''}} value="7:00">7:00</option>
                                <option {{$InstitucionAgendamiento->lunes_open == "7:30" ?  'selected' : ''}} value="7:30">7:30</option>
                                <option {{$InstitucionAgendamiento->lunes_open == "8:00" ?  'selected' : ''}} value="8:00">8:00</option>
                                <option {{$InstitucionAgendamiento->lunes_open == "8:30" ?  'selected' : ''}} value="8:30">8:30</option>
                                <option {{$InstitucionAgendamiento->lunes_open == "9:00" ?  'selected' : ''}} value="9:00">9:00</option>
                                <option {{$InstitucionAgendamiento->lunes_open == "9:30" ?  'selected' : ''}} value="9:30">9:30</option>
                                <option {{$InstitucionAgendamiento->lunes_open == "10:00" ?  'selected' : ''}} value="10:00">10:00</option>
                                <option {{$InstitucionAgendamiento->lunes_open == "10:30" ?  'selected' : ''}} value="10:30">10:30</option>
                                <option {{$InstitucionAgendamiento->lunes_open == "11:00" ?  'selected' : ''}} value="11:00">11:00</option>
                                <option {{$InstitucionAgendamiento->lunes_open == "11:30" ?  'selected' : ''}} value="11:30">11:30</option>
                                <option {{$InstitucionAgendamiento->lunes_open == "12:00" ?  'selected' : ''}} value="12:00">12:00</option>
                                <option {{$InstitucionAgendamiento->lunes_open == "12:30" ?  'selected' : ''}} value="12:30">12:30</option>
                            </select>
                            <span>-</span>
                            <select name="lunes_close">
                                <option {{$InstitucionAgendamiento->lunes_close == "13:00" ?  'selected' : ''}} value="13:00">13:00</option>
                                <option {{$InstitucionAgendamiento->lunes_close == "13:30" ?  'selected' : ''}} value="13:30">13:30</option>
                                <option {{$InstitucionAgendamiento->lunes_close == "14:00" ?  'selected' : ''}} value="14:00">14:00</option>
                                <option {{$InstitucionAgendamiento->lunes_close == "14:30" ?  'selected' : ''}} value="14:30">14:30</option>
                                <option {{$InstitucionAgendamiento->lunes_close == "15:00" ?  'selected' : ''}} value="15:00">15:00</option>
                                <option {{$InstitucionAgendamiento->lunes_close == "15:30" ?  'selected' : ''}} value="15:30">15:30</option>
                                <option {{$InstitucionAgendamiento->lunes_close == "16:00" ?  'selected' : ''}} value="16:00">16:00</option>
                                <option {{$InstitucionAgendamiento->lunes_close == "16:30" ?  'selected' : ''}} value="16:30">16:30</option>
                                <option {{$InstitucionAgendamiento->lunes_close == "17:00" ?  'selected' : ''}} value="17:00">17:00</option>
                                <option {{$InstitucionAgendamiento->lunes_close == "17:30" ?  'selected' : ''}} value="17:30">17:30</option>
                                <option {{$InstitucionAgendamiento->lunes_close == "18:00" ?  'selected' : ''}} value="18:00">18:00</option>
                                <option {{$InstitucionAgendamiento->lunes_close == "18:30" ?  'selected' : ''}} value="18:30">18:30</option>
                                <option {{$InstitucionAgendamiento->lunes_close == "19:00" ?  'selected' : ''}} value="19:00">19:00</option>
                                <option {{$InstitucionAgendamiento->lunes_close == "19:30" ?  'selected' : ''}} value="19:30">19:30</option>
                                <option {{$InstitucionAgendamiento->lunes_close == "20:00" ?  'selected' : ''}} value="20:00">20:00</option>
                                <option {{$InstitucionAgendamiento->lunes_close == "20:30" ?  'selected' : ''}} value="20:30">20:30</option>
                                <option {{$InstitucionAgendamiento->lunes_close == "21:00" ?  'selected' : ''}} value="21:00">21:00</option>
                                <option {{$InstitucionAgendamiento->lunes_close == "21:30" ?  'selected' : ''}} value="21:30">21:30</option>
                            </select>
                        </div>
                        <div>
                            <select name="martes_open">
                                <option {{$InstitucionAgendamiento->martes_open == "6:00" ?  'selected' : ''}} value="6:00">6:00</option>
                                <option {{$InstitucionAgendamiento->martes_open == "6:30" ?  'selected' : ''}} value="6:30">6:30</option>
                                <option {{$InstitucionAgendamiento->martes_open == "7:00" ?  'selected' : ''}} value="7:00">7:00</option>
                                <option {{$InstitucionAgendamiento->martes_open == "7:30" ?  'selected' : ''}} value="7:30">7:30</option>
                                <option {{$InstitucionAgendamiento->martes_open == "8:00" ?  'selected' : ''}} value="8:00">8:00</option>
                                <option {{$InstitucionAgendamiento->martes_open == "8:30" ?  'selected' : ''}} value="8:30">8:30</option>
                                <option {{$InstitucionAgendamiento->martes_open == "9:00" ?  'selected' : ''}} value="9:00">9:00</option>
                                <option {{$InstitucionAgendamiento->martes_open == "9:30" ?  'selected' : ''}} value="9:30">9:30</option>
                                <option {{$InstitucionAgendamiento->martes_open == "10:00" ?  'selected' : ''}} value="10:00">10:00</option>
                                <option {{$InstitucionAgendamiento->martes_open == "10:30" ?  'selected' : ''}} value="10:30">10:30</option>
                                <option {{$InstitucionAgendamiento->martes_open == "11:00" ?  'selected' : ''}} value="11:00">11:00</option>
                                <option {{$InstitucionAgendamiento->martes_open == "11:30" ?  'selected' : ''}} value="11:30">11:30</option>
                                <option {{$InstitucionAgendamiento->martes_open == "12:00" ?  'selected' : ''}} value="12:00">12:00</option>
                                <option {{$InstitucionAgendamiento->martes_open == "12:30" ?  'selected' : ''}} value="12:30">12:30</option>
                            </select>
                            <span>-</span>
                            <select name="martes_close">
                                <option {{$InstitucionAgendamiento->martes_close == "13:00" ?  'selected' : ''}} value="13:00">13:00</option>
                                <option {{$InstitucionAgendamiento->martes_close == "13:30" ?  'selected' : ''}} value="13:30">13:30</option>
                                <option {{$InstitucionAgendamiento->martes_close == "14:00" ?  'selected' : ''}} value="14:00">14:00</option>
                                <option {{$InstitucionAgendamiento->martes_close == "14:30" ?  'selected' : ''}} value="14:30">14:30</option>
                                <option {{$InstitucionAgendamiento->martes_close == "15:00" ?  'selected' : ''}} value="15:00">15:00</option>
                                <option {{$InstitucionAgendamiento->martes_close == "15:30" ?  'selected' : ''}} value="15:30">15:30</option>
                                <option {{$InstitucionAgendamiento->martes_close == "16:00" ?  'selected' : ''}} value="16:00">16:00</option>
                                <option {{$InstitucionAgendamiento->martes_close == "16:30" ?  'selected' : ''}} value="16:30">16:30</option>
                                <option {{$InstitucionAgendamiento->martes_close == "17:00" ?  'selected' : ''}} value="17:00">17:00</option>
                                <option {{$InstitucionAgendamiento->martes_close == "17:30" ?  'selected' : ''}} value="17:30">17:30</option>
                                <option {{$InstitucionAgendamiento->martes_close == "18:00" ?  'selected' : ''}} value="18:00">18:00</option>
                                <option {{$InstitucionAgendamiento->martes_close == "18:30" ?  'selected' : ''}} value="18:30">18:30</option>
                                <option {{$InstitucionAgendamiento->martes_close == "19:00" ?  'selected' : ''}} value="19:00">19:00</option>
                                <option {{$InstitucionAgendamiento->martes_close == "19:30" ?  'selected' : ''}} value="19:30">19:30</option>
                                <option {{$InstitucionAgendamiento->martes_close == "20:00" ?  'selected' : ''}} value="20:00">20:00</option>
                                <option {{$InstitucionAgendamiento->martes_close == "20:30" ?  'selected' : ''}} value="20:30">20:30</option>
                                <option {{$InstitucionAgendamiento->martes_close == "21:00" ?  'selected' : ''}} value="21:00">21:00</option>
                                <option {{$InstitucionAgendamiento->martes_close == "21:30" ?  'selected' : ''}} value="21:30">21:30</option>
                            </select>
                        </div>
                        <div>
                            <select name="miercoles_open">
                                <option {{$InstitucionAgendamiento->miercoles_open == "6:00" ?  'selected' : ''}} value="6:00">6:00</option>
                                <option {{$InstitucionAgendamiento->miercoles_open == "6:30" ?  'selected' : ''}} value="6:30">6:30</option>
                                <option {{$InstitucionAgendamiento->miercoles_open == "7:00" ?  'selected' : ''}} value="7:00">7:00</option>
                                <option {{$InstitucionAgendamiento->miercoles_open == "7:30" ?  'selected' : ''}} value="7:30">7:30</option>
                                <option {{$InstitucionAgendamiento->miercoles_open == "8:00" ?  'selected' : ''}} value="8:00">8:00</option>
                                <option {{$InstitucionAgendamiento->miercoles_open == "8:30" ?  'selected' : ''}} value="8:30">8:30</option>
                                <option {{$InstitucionAgendamiento->miercoles_open == "9:00" ?  'selected' : ''}} value="9:00">9:00</option>
                                <option {{$InstitucionAgendamiento->miercoles_open == "9:30" ?  'selected' : ''}} value="9:30">9:30</option>
                                <option {{$InstitucionAgendamiento->miercoles_open == "10:00" ?  'selected' : ''}} value="10:00">10:00</option>
                                <option {{$InstitucionAgendamiento->miercoles_open == "10:30" ?  'selected' : ''}} value="10:30">10:30</option>
                                <option {{$InstitucionAgendamiento->miercoles_open == "11:00" ?  'selected' : ''}} value="11:00">11:00</option>
                                <option {{$InstitucionAgendamiento->miercoles_open == "11:30" ?  'selected' : ''}} value="11:30">11:30</option>
                                <option {{$InstitucionAgendamiento->miercoles_open == "12:00" ?  'selected' : ''}} value="12:00">12:00</option>
                                <option {{$InstitucionAgendamiento->miercoles_open == "12:30" ?  'selected' : ''}} value="12:30">12:30</option>
                            </select>
                            <span>-</span>
                            <select name="miercoles_close">
                                <option {{$InstitucionAgendamiento->miercoles_close == "13:00" ?  'selected' : ''}} value="13:00">13:00</option>
                                <option {{$InstitucionAgendamiento->miercoles_close == "13:30" ?  'selected' : ''}} value="13:30">13:30</option>
                                <option {{$InstitucionAgendamiento->miercoles_close == "14:00" ?  'selected' : ''}} value="14:00">14:00</option>
                                <option {{$InstitucionAgendamiento->miercoles_close == "14:30" ?  'selected' : ''}} value="14:30">14:30</option>
                                <option {{$InstitucionAgendamiento->miercoles_close == "15:00" ?  'selected' : ''}} value="15:00">15:00</option>
                                <option {{$InstitucionAgendamiento->miercoles_close == "15:30" ?  'selected' : ''}} value="15:30">15:30</option>
                                <option {{$InstitucionAgendamiento->miercoles_close == "16:00" ?  'selected' : ''}} value="16:00">16:00</option>
                                <option {{$InstitucionAgendamiento->miercoles_close == "16:30" ?  'selected' : ''}} value="16:30">16:30</option>
                                <option {{$InstitucionAgendamiento->miercoles_close == "17:00" ?  'selected' : ''}} value="17:00">17:00</option>
                                <option {{$InstitucionAgendamiento->miercoles_close == "17:30" ?  'selected' : ''}} value="17:30">17:30</option>
                                <option {{$InstitucionAgendamiento->miercoles_close == "18:00" ?  'selected' : ''}} value="18:00">18:00</option>
                                <option {{$InstitucionAgendamiento->miercoles_close == "18:30" ?  'selected' : ''}} value="18:30">18:30</option>
                                <option {{$InstitucionAgendamiento->miercoles_close == "19:00" ?  'selected' : ''}} value="19:00">19:00</option>
                                <option {{$InstitucionAgendamiento->miercoles_close == "19:30" ?  'selected' : ''}} value="19:30">19:30</option>
                                <option {{$InstitucionAgendamiento->miercoles_close == "20:00" ?  'selected' : ''}} value="20:00">20:00</option>
                                <option {{$InstitucionAgendamiento->miercoles_close == "20:30" ?  'selected' : ''}} value="20:30">20:30</option>
                                <option {{$InstitucionAgendamiento->miercoles_close == "21:00" ?  'selected' : ''}} value="21:00">21:00</option>
                                <option {{$InstitucionAgendamiento->miercoles_close == "21:30" ?  'selected' : ''}} value="21:30">21:30</option>
                            </select>
                        </div>
                        <div>
                            <select name="jueves_open">
                                <option {{$InstitucionAgendamiento->jueves_open == "6:00" ?  'selected' : ''}} value="6:00">6:00</option>
                                <option {{$InstitucionAgendamiento->jueves_open == "6:30" ?  'selected' : ''}} value="6:30">6:30</option>
                                <option {{$InstitucionAgendamiento->jueves_open == "7:00" ?  'selected' : ''}} value="7:00">7:00</option>
                                <option {{$InstitucionAgendamiento->jueves_open == "7:30" ?  'selected' : ''}} value="7:30">7:30</option>
                                <option {{$InstitucionAgendamiento->jueves_open == "8:00" ?  'selected' : ''}} value="8:00">8:00</option>
                                <option {{$InstitucionAgendamiento->jueves_open == "8:30" ?  'selected' : ''}} value="8:30">8:30</option>
                                <option {{$InstitucionAgendamiento->jueves_open == "9:00" ?  'selected' : ''}} value="9:00">9:00</option>
                                <option {{$InstitucionAgendamiento->jueves_open == "9:30" ?  'selected' : ''}} value="9:30">9:30</option>
                                <option {{$InstitucionAgendamiento->jueves_open == "10:00" ?  'selected' : ''}} value="10:00">10:00</option>
                                <option {{$InstitucionAgendamiento->jueves_open == "10:30" ?  'selected' : ''}} value="10:30">10:30</option>
                                <option {{$InstitucionAgendamiento->jueves_open == "11:00" ?  'selected' : ''}} value="11:00">11:00</option>
                                <option {{$InstitucionAgendamiento->jueves_open == "11:30" ?  'selected' : ''}} value="11:30">11:30</option>
                                <option {{$InstitucionAgendamiento->jueves_open == "12:00" ?  'selected' : ''}} value="12:00">12:00</option>
                                <option {{$InstitucionAgendamiento->jueves_open == "12:30" ?  'selected' : ''}} value="12:30">12:30</option>
                            </select>
                            <span>-</span>
                            <select name="jueves_close">
                                <option {{$InstitucionAgendamiento->jueves_close == "13:00" ?  'selected' : ''}} value="13:00">13:00</option>
                                <option {{$InstitucionAgendamiento->jueves_close == "13:30" ?  'selected' : ''}} value="13:30">13:30</option>
                                <option {{$InstitucionAgendamiento->jueves_close == "14:00" ?  'selected' : ''}} value="14:00">14:00</option>
                                <option {{$InstitucionAgendamiento->jueves_close == "14:30" ?  'selected' : ''}} value="14:30">14:30</option>
                                <option {{$InstitucionAgendamiento->jueves_close == "15:00" ?  'selected' : ''}} value="15:00">15:00</option>
                                <option {{$InstitucionAgendamiento->jueves_close == "15:30" ?  'selected' : ''}} value="15:30">15:30</option>
                                <option {{$InstitucionAgendamiento->jueves_close == "16:00" ?  'selected' : ''}} value="16:00">16:00</option>
                                <option {{$InstitucionAgendamiento->jueves_close == "16:30" ?  'selected' : ''}} value="16:30">16:30</option>
                                <option {{$InstitucionAgendamiento->jueves_close == "17:00" ?  'selected' : ''}} value="17:00">17:00</option>
                                <option {{$InstitucionAgendamiento->jueves_close == "17:30" ?  'selected' : ''}} value="17:30">17:30</option>
                                <option {{$InstitucionAgendamiento->jueves_close == "18:00" ?  'selected' : ''}} value="18:00">18:00</option>
                                <option {{$InstitucionAgendamiento->jueves_close == "18:30" ?  'selected' : ''}} value="18:30">18:30</option>
                                <option {{$InstitucionAgendamiento->jueves_close == "19:00" ?  'selected' : ''}} value="19:00">19:00</option>
                                <option {{$InstitucionAgendamiento->jueves_close == "19:30" ?  'selected' : ''}} value="19:30">19:30</option>
                                <option {{$InstitucionAgendamiento->jueves_close == "20:00" ?  'selected' : ''}} value="20:00">20:00</option>
                                <option {{$InstitucionAgendamiento->jueves_close == "20:30" ?  'selected' : ''}} value="20:30">20:30</option>
                                <option {{$InstitucionAgendamiento->jueves_close == "21:00" ?  'selected' : ''}} value="21:00">21:00</option>
                                <option {{$InstitucionAgendamiento->jueves_close == "21:30" ?  'selected' : ''}} value="21:30">21:30</option>
                            </select>
                        </div>
                        <div>
                            <select name="viernes_open">
                                <option {{$InstitucionAgendamiento->viernes_open == "6:00" ?  'selected' : ''}} value="6:00">6:00</option>
                                <option {{$InstitucionAgendamiento->viernes_open == "6:30" ?  'selected' : ''}} value="6:30">6:30</option>
                                <option {{$InstitucionAgendamiento->viernes_open == "7:00" ?  'selected' : ''}} value="7:00">7:00</option>
                                <option {{$InstitucionAgendamiento->viernes_open == "7:30" ?  'selected' : ''}} value="7:30">7:30</option>
                                <option {{$InstitucionAgendamiento->viernes_open == "8:00" ?  'selected' : ''}} value="8:00">8:00</option>
                                <option {{$InstitucionAgendamiento->viernes_open == "8:30" ?  'selected' : ''}} value="8:30">8:30</option>
                                <option {{$InstitucionAgendamiento->viernes_open == "9:00" ?  'selected' : ''}} value="9:00">9:00</option>
                                <option {{$InstitucionAgendamiento->viernes_open == "9:30" ?  'selected' : ''}} value="9:30">9:30</option>
                                <option {{$InstitucionAgendamiento->viernes_open == "10:00" ?  'selected' : ''}} value="10:00">10:00</option>
                                <option {{$InstitucionAgendamiento->viernes_open == "10:30" ?  'selected' : ''}} value="10:30">10:30</option>
                                <option {{$InstitucionAgendamiento->viernes_open == "11:00" ?  'selected' : ''}} value="11:00">11:00</option>
                                <option {{$InstitucionAgendamiento->viernes_open == "11:30" ?  'selected' : ''}} value="11:30">11:30</option>
                                <option {{$InstitucionAgendamiento->viernes_open == "12:00" ?  'selected' : ''}} value="12:00">12:00</option>
                                <option {{$InstitucionAgendamiento->viernes_open == "12:30" ?  'selected' : ''}} value="12:30">12:30</option>
                            </select>
                            <span>-</span>
                            <select name="viernes_close">
                                <option {{$InstitucionAgendamiento->viernes_close == "13:00" ?  'selected' : ''}} value="13:00">13:00</option>
                                <option {{$InstitucionAgendamiento->viernes_close == "13:30" ?  'selected' : ''}} value="13:30">13:30</option>
                                <option {{$InstitucionAgendamiento->viernes_close == "14:00" ?  'selected' : ''}} value="14:00">14:00</option>
                                <option {{$InstitucionAgendamiento->viernes_close == "14:30" ?  'selected' : ''}} value="14:30">14:30</option>
                                <option {{$InstitucionAgendamiento->viernes_close == "15:00" ?  'selected' : ''}} value="15:00">15:00</option>
                                <option {{$InstitucionAgendamiento->viernes_close == "15:30" ?  'selected' : ''}} value="15:30">15:30</option>
                                <option {{$InstitucionAgendamiento->viernes_close == "16:00" ?  'selected' : ''}} value="16:00">16:00</option>
                                <option {{$InstitucionAgendamiento->viernes_close == "16:30" ?  'selected' : ''}} value="16:30">16:30</option>
                                <option {{$InstitucionAgendamiento->viernes_close == "17:00" ?  'selected' : ''}} value="17:00">17:00</option>
                                <option {{$InstitucionAgendamiento->viernes_close == "17:30" ?  'selected' : ''}} value="17:30">17:30</option>
                                <option {{$InstitucionAgendamiento->viernes_close == "18:00" ?  'selected' : ''}} value="18:00">18:00</option>
                                <option {{$InstitucionAgendamiento->viernes_close == "18:30" ?  'selected' : ''}} value="18:30">18:30</option>
                                <option {{$InstitucionAgendamiento->viernes_close == "19:00" ?  'selected' : ''}} value="19:00">19:00</option>
                                <option {{$InstitucionAgendamiento->viernes_close == "19:30" ?  'selected' : ''}} value="19:30">19:30</option>
                                <option {{$InstitucionAgendamiento->viernes_close == "20:00" ?  'selected' : ''}} value="20:00">20:00</option>
                                <option {{$InstitucionAgendamiento->viernes_close == "20:30" ?  'selected' : ''}} value="20:30">20:30</option>
                                <option {{$InstitucionAgendamiento->viernes_close == "21:00" ?  'selected' : ''}} value="21:00">21:00</option>
                                <option {{$InstitucionAgendamiento->viernes_close == "21:30" ?  'selected' : ''}} value="21:30">21:30</option>
                            </select>
                        </div>
                        <div>
                            <select name="sabado_open">
                                <option {{$InstitucionAgendamiento->sabado_open == "6:00" ?  'selected' : ''}} value="6:00">6:00</option>
                                <option {{$InstitucionAgendamiento->sabado_open == "6:30" ?  'selected' : ''}} value="6:30">6:30</option>
                                <option {{$InstitucionAgendamiento->sabado_open == "7:00" ?  'selected' : ''}} value="7:00">7:00</option>
                                <option {{$InstitucionAgendamiento->sabado_open == "7:30" ?  'selected' : ''}} value="7:30">7:30</option>
                                <option {{$InstitucionAgendamiento->sabado_open == "8:00" ?  'selected' : ''}} value="8:00">8:00</option>
                                <option {{$InstitucionAgendamiento->sabado_open == "8:30" ?  'selected' : ''}} value="8:30">8:30</option>
                                <option {{$InstitucionAgendamiento->sabado_open == "9:00" ?  'selected' : ''}} value="9:00">9:00</option>
                                <option {{$InstitucionAgendamiento->sabado_open == "9:30" ?  'selected' : ''}} value="9:30">9:30</option>
                                <option {{$InstitucionAgendamiento->sabado_open == "10:00" ?  'selected' : ''}} value="10:00">10:00</option>
                                <option {{$InstitucionAgendamiento->sabado_open == "10:30" ?  'selected' : ''}} value="10:30">10:30</option>
                                <option {{$InstitucionAgendamiento->sabado_open == "11:00" ?  'selected' : ''}} value="11:00">11:00</option>
                                <option {{$InstitucionAgendamiento->sabado_open == "11:30" ?  'selected' : ''}} value="11:30">11:30</option>
                                <option {{$InstitucionAgendamiento->sabado_open == "12:00" ?  'selected' : ''}} value="12:00">12:00</option>
                                <option {{$InstitucionAgendamiento->sabado_open == "12:30" ?  'selected' : ''}} value="12:30">12:30</option>
                            </select>
                            <span>-</span>
                            <select name="sabado_close">
                                <option {{$InstitucionAgendamiento->sabado_close == "13:00" ?  'selected' : ''}} value="13:00">13:00</option>
                                <option {{$InstitucionAgendamiento->sabado_close == "13:30" ?  'selected' : ''}} value="13:30">13:30</option>
                                <option {{$InstitucionAgendamiento->sabado_close == "14:00" ?  'selected' : ''}} value="14:00">14:00</option>
                                <option {{$InstitucionAgendamiento->sabado_close == "14:30" ?  'selected' : ''}} value="14:30">14:30</option>
                                <option {{$InstitucionAgendamiento->sabado_close == "15:00" ?  'selected' : ''}} value="15:00">15:00</option>
                                <option {{$InstitucionAgendamiento->sabado_close == "15:30" ?  'selected' : ''}} value="15:30">15:30</option>
                                <option {{$InstitucionAgendamiento->sabado_close == "16:00" ?  'selected' : ''}} value="16:00">16:00</option>
                                <option {{$InstitucionAgendamiento->sabado_close == "16:30" ?  'selected' : ''}} value="16:30">16:30</option>
                                <option {{$InstitucionAgendamiento->sabado_close == "17:00" ?  'selected' : ''}} value="17:00">17:00</option>
                                <option {{$InstitucionAgendamiento->sabado_close == "17:30" ?  'selected' : ''}} value="17:30">17:30</option>
                                <option {{$InstitucionAgendamiento->sabado_close == "18:00" ?  'selected' : ''}} value="18:00">18:00</option>
                                <option {{$InstitucionAgendamiento->sabado_close == "18:30" ?  'selected' : ''}} value="18:30">18:30</option>
                                <option {{$InstitucionAgendamiento->sabado_close == "19:00" ?  'selected' : ''}} value="19:00">19:00</option>
                                <option {{$InstitucionAgendamiento->sabado_close == "19:30" ?  'selected' : ''}} value="19:30">19:30</option>
                                <option {{$InstitucionAgendamiento->sabado_close == "20:00" ?  'selected' : ''}} value="20:00">20:00</option>
                                <option {{$InstitucionAgendamiento->sabado_close == "20:30" ?  'selected' : ''}} value="20:30">20:30</option>
                                <option {{$InstitucionAgendamiento->sabado_close == "21:00" ?  'selected' : ''}} value="21:00">21:00</option>
                                <option {{$InstitucionAgendamiento->sabado_close == "21:30" ?  'selected' : ''}} value="21:30">21:30</option>
                            </select>
                        </div>
                        <div>
                            <select name="domingo_open">
                                <option {{$InstitucionAgendamiento->domingo_open == "6:00" ?  'selected' : ''}} value="6:00">6:00</option>
                                <option {{$InstitucionAgendamiento->domingo_open == "6:30" ?  'selected' : ''}} value="6:30">6:30</option>
                                <option {{$InstitucionAgendamiento->domingo_open == "7:00" ?  'selected' : ''}} value="7:00">7:00</option>
                                <option {{$InstitucionAgendamiento->domingo_open == "7:30" ?  'selected' : ''}} value="7:30">7:30</option>
                                <option {{$InstitucionAgendamiento->domingo_open == "8:00" ?  'selected' : ''}} value="8:00">8:00</option>
                                <option {{$InstitucionAgendamiento->domingo_open == "8:30" ?  'selected' : ''}} value="8:30">8:30</option>
                                <option {{$InstitucionAgendamiento->domingo_open == "9:00" ?  'selected' : ''}} value="9:00">9:00</option>
                                <option {{$InstitucionAgendamiento->domingo_open == "9:30" ?  'selected' : ''}} value="9:30">9:30</option>
                                <option {{$InstitucionAgendamiento->domingo_open == "10:00" ?  'selected' : ''}} value="10:00">10:00</option>
                                <option {{$InstitucionAgendamiento->domingo_open == "10:30" ?  'selected' : ''}} value="10:30">10:30</option>
                                <option {{$InstitucionAgendamiento->domingo_open == "11:00" ?  'selected' : ''}} value="11:00">11:00</option>
                                <option {{$InstitucionAgendamiento->domingo_open == "11:30" ?  'selected' : ''}} value="11:30">11:30</option>
                                <option {{$InstitucionAgendamiento->domingo_open == "12:00" ?  'selected' : ''}} value="12:00">12:00</option>
                                <option {{$InstitucionAgendamiento->domingo_open == "12:30" ?  'selected' : ''}} value="12:30">12:30</option>
                            </select>
                            <span>-</span>
                            <select name="domingo_close">
                                <option {{$InstitucionAgendamiento->domingo_close == "13:00" ?  'selected' : ''}} value="13:00">13:00</option>
                                <option {{$InstitucionAgendamiento->domingo_close == "13:30" ?  'selected' : ''}} value="13:30">13:30</option>
                                <option {{$InstitucionAgendamiento->domingo_close == "14:00" ?  'selected' : ''}} value="14:00">14:00</option>
                                <option {{$InstitucionAgendamiento->domingo_close == "14:30" ?  'selected' : ''}} value="14:30">14:30</option>
                                <option {{$InstitucionAgendamiento->domingo_close == "15:00" ?  'selected' : ''}} value="15:00">15:00</option>
                                <option {{$InstitucionAgendamiento->domingo_close == "15:30" ?  'selected' : ''}} value="15:30">15:30</option>
                                <option {{$InstitucionAgendamiento->domingo_close == "16:00" ?  'selected' : ''}} value="16:00">16:00</option>
                                <option {{$InstitucionAgendamiento->domingo_close == "16:30" ?  'selected' : ''}} value="16:30">16:30</option>
                                <option {{$InstitucionAgendamiento->domingo_close == "17:00" ?  'selected' : ''}} value="17:00">17:00</option>
                                <option {{$InstitucionAgendamiento->domingo_close == "17:30" ?  'selected' : ''}} value="17:30">17:30</option>
                                <option {{$InstitucionAgendamiento->domingo_close == "18:00" ?  'selected' : ''}} value="18:00">18:00</option>
                                <option {{$InstitucionAgendamiento->domingo_close == "18:30" ?  'selected' : ''}} value="18:30">18:30</option>
                                <option {{$InstitucionAgendamiento->domingo_close == "19:00" ?  'selected' : ''}} value="19:00">19:00</option>
                                <option {{$InstitucionAgendamiento->domingo_close == "19:30" ?  'selected' : ''}} value="19:30">19:30</option>
                                <option {{$InstitucionAgendamiento->domingo_close == "20:00" ?  'selected' : ''}} value="20:00">20:00</option>
                                <option {{$InstitucionAgendamiento->domingo_close == "20:30" ?  'selected' : ''}} value="20:30">20:30</option>
                                <option {{$InstitucionAgendamiento->domingo_close == "21:00" ?  'selected' : ''}} value="21:00">21:00</option>
                                <option {{$InstitucionAgendamiento->domingo_close == "21:30" ?  'selected' : ''}} value="21:30">21:30</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <button type="submit" class="primario bg-transparent p-1 text-light fw-bold">Guardar y continuar</button>
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
    <script src="../../js/modal.js"></script>
</body>

</html>