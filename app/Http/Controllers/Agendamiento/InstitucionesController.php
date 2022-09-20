<?php

namespace App\Http\Controllers\Agendamiento;

use App\Http\Controllers\Controller;
use App\Models\InstitucionAgendamiento;
use Illuminate\Http\Request;

use App\Models\UserEmpresa;

class InstitucionesController extends Controller
{
    public function index(){
        //Traer el ID de la empresa.
        $EmpresaId = id_empresa();
        $Institución = InstitucionAgendamiento::select('*')->where([['empresa_id', '=', $EmpresaId]])->count(); 
        //Ya existe el registro, lo lleva a una vista para editar.
        if($Institución == 1){
            $ultimo_registro_institucion = InstitucionAgendamiento::select('id')->where([['empresa_id', '=', $EmpresaId]])->first();
            return redirect('/Agendamiento/'.$ultimo_registro_institucion->id.'/edit');
        }
        //Primera vez, lo lleva a la vista crear.
        else{
            return view('Configuracion_Agendamiento.HorarioInstituciones.create');
        }
    }


    public function store(Request $request)
    {
        $data = $request;
        $EmpresaId = id_empresa();
        //Verifica si el usuario marco o no el check para definir si el negocio esta abierto o cerrado en ese día.
        $lunes = horario($data["lunes"]);
        $martes = horario($data["martes"]);
        $miercoles = horario($data["miercoles"]);
        $jueves = horario($data["jueves"]);
        $viernes = horario($data["viernes"]);
        $sabado = horario($data["sabado"]);
        $domingo = horario($data["domingo"]);

        //Crea el servicio
        InstitucionAgendamiento::create([
            'empresa_id' =>$EmpresaId,
            'lunes'=>$lunes,
            'martes'=>$martes,
            'miercoles'=>$miercoles,
            'jueves'=>$jueves,
            'viernes'=>$viernes,
            'sabado'=>$sabado,
            'domingo'=>$domingo,
            'lunes_open'=>$data->lunes_open,
            'lunes_close'=>$data->lunes_close,
            'martes_open'=>$data->martes_open,
            'martes_close'=>$data->martes_close,
            'miercoles_open'=>$data->miercoles_open,
            'miercoles_close'=>$data->miercoles_close,
            'jueves_open'=>$data->jueves_open,
            'jueves_close'=>$data->jueves_close,
            'viernes_open'=>$data->viernes_open,
            'viernes_close'=>$data->viernes_close,
            'sabado_open'=>$data->sabado_open,
            'sabado_close'=>$data->sabado_close,
            'domingo_open'=>$data->domingo_open,
            'domingo_close'=>$data->domingo_close
        ]);
        return redirect("Agendamiento/instituciones");
    }

    public function edit(InstitucionAgendamiento $InstitucionAgendamiento){
        return view('Configuracion_Agendamiento.HorarioInstituciones.edit',compact('InstitucionAgendamiento'));
    }

    public function update(Request $request, InstitucionAgendamiento $InstitucionAgendamiento)
    {
        $data = $request;


        $EmpresaId = id_empresa();
        //Verifica si el usuario marco o no el check para definir si el negocio esta abierto o cerrado en ese día.
        $lunes = horario($data["lunes"]);
        $martes = horario($data["martes"]);
        $miercoles = horario($data["miercoles"]);
        $jueves = horario($data["jueves"]);
        $viernes = horario($data["viernes"]);
        $sabado = horario($data["sabado"]);
        $domingo = horario($data["domingo"]);

        //Atributos a ACTUALIZAR.
        $InstitucionAgendamiento->lunes = $lunes;
        $InstitucionAgendamiento->martes = $martes;
        $InstitucionAgendamiento->miercoles = $miercoles;
        $InstitucionAgendamiento->jueves = $jueves;
        $InstitucionAgendamiento->viernes = $viernes;
        $InstitucionAgendamiento->sabado = $sabado;
        $InstitucionAgendamiento->domingo = $domingo;
        $InstitucionAgendamiento->lunes_open = $data['lunes_open'];
        $InstitucionAgendamiento->lunes_close = $data->lunes_close;
        $InstitucionAgendamiento->martes_open=$data->martes_open;
        $InstitucionAgendamiento->martes_close=$data->martes_close;
        $InstitucionAgendamiento->miercoles_open=$data->miercoles_open;
        $InstitucionAgendamiento->miercoles_close=$data->miercoles_close;
        $InstitucionAgendamiento->jueves_open=$data->jueves_open;
        $InstitucionAgendamiento->jueves_close=$data->jueves_close;
        $InstitucionAgendamiento->viernes_open=$data->viernes_open;
        $InstitucionAgendamiento->viernes_close=$data->viernes_close;
        $InstitucionAgendamiento->sabado_open=$data->sabado_open;
        $InstitucionAgendamiento->sabado_close=$data->sabado_close;
        $InstitucionAgendamiento->domingo_open=$data->domingo_open;
        $InstitucionAgendamiento->domingo_close=$data->domingo_close;

  
        $InstitucionAgendamiento->update();
        return redirect('/Agendamiento/'.$InstitucionAgendamiento->id.'/edit');

    }
}

function horario($dia){
    if(isset($dia)){
        $result = 'Abierto';
    }else{
        $result = 'Cerrado';
    }
    return $result;
}

function id_empresa(){
    //Traer el ID de la empresa.
    $user_id = auth()->user()->id;
    $UserEmpresa = UserEmpresa::select('*')->where([['user_id', '=', $user_id]])->first(); 
    return $UserEmpresa->empresa_id;
}
