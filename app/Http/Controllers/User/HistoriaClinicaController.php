<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Paciente;
use App\Models\UserEmpresa;
use App\Models\HistoriaClinica;

class HistoriaClinicaController extends Controller
{
    public function index()
    {
    //Validar que sean los servicios propios de esa empresa.
    $user_id = auth()->user()->id;
    //dd($user_id);
    //Consultar la empresa a la que pertenece el usuario.
    $UserEmpresa = UserEmpresa::select('*')->where([['user_id', '=', $user_id]])->first(); 
    //Mostrar los registros que corresponden al ID de esa empresa.
    $Historias = HistoriaClinica::select('*')
    ->join('pacientes','pacientes.id','=','historia_clinicas.paciente_id')
    ->where([['historia_clinicas.empresa_id', '=', $UserEmpresa->empresa_id]])->get();

    return view('Configuracion_Inicial.HistoriasClinicas.index-historias-clinicas',compact('Historias'));
    }

    public function create()
    {
        $user_id = auth()->user()->id;
        //dd($user_id);
        //Consultar la empresa a la que pertenece el usuario.
        $UserEmpresa = UserEmpresa::select('*')->where([['user_id', '=', $user_id]])->first(); 
        $Pacientes = Paciente::select('*')->where([['empresa_id', '=', $UserEmpresa->empresa_id]])->get();
        return view('Configuracion_Inicial.HistoriasClinicas.create',compact('Pacientes'));
    }

}


