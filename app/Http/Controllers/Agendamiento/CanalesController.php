<?php

namespace App\Http\Controllers\Agendamiento;

use App\Http\Controllers\Controller;
use App\Models\InstitucionAgendamiento;
use Illuminate\Http\Request;

use App\Models\UserEmpresa;

class CanalesController extends Controller
{
    public function index(){
        return view('Configuracion_Agendamiento.CanalesAgendamiento.index');
    }

}