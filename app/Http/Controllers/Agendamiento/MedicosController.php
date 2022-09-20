<?php

namespace App\Http\Controllers\Agendamiento;

use App\Http\Controllers\Controller;
use App\Models\MedicoAgendamiento;
use Illuminate\Http\Request;

use App\Models\UserEmpresa;

class MedicosController extends Controller
{
    public function index(){
        //Traer el ID de la empresa.
        $EmpresaId = id_empresa();
        $Medicos = MedicoAgendamiento::select('*')->where([['empresa_id', '=', $EmpresaId]])->count(); 
        //Ya existe el registro, lo lleva a una vista para editar.
        if($Medicos == 1){
            $ultimo_registro_institucion = MedicoAgendamiento::select('id')->where([['empresa_id', '=', $EmpresaId]])->first();
            return redirect('/AgendamientoMedico/'.$ultimo_registro_institucion->id.'/edit');
        }
        //Primera vez, lo lleva a la vista crear.
        else{
            return view('Configuracion_Agendamiento.HorarioMedicos.create');
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
        MedicoAgendamiento::create([
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

    public function edit(MedicoAgendamiento $MedicoAgendamiento){
        return view('Configuracion_Agendamiento.HorarioMedicos.edit',compact('MedicoAgendamiento'));
    }

    public function update(Request $request, MedicoAgendamiento $MedicoAgendamiento)
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
        $MedicoAgendamiento->lunes = $lunes;
        $MedicoAgendamiento->martes = $martes;
        $MedicoAgendamiento->miercoles = $miercoles;
        $MedicoAgendamiento->jueves = $jueves;
        $MedicoAgendamiento->viernes = $viernes;
        $MedicoAgendamiento->sabado = $sabado;
        $MedicoAgendamiento->domingo = $domingo;
        $MedicoAgendamiento->lunes_open = $data['lunes_open'];
        $MedicoAgendamiento->lunes_close = $data->lunes_close;
        $MedicoAgendamiento->martes_open=$data->martes_open;
        $MedicoAgendamiento->martes_close=$data->martes_close;
        $MedicoAgendamiento->miercoles_open=$data->miercoles_open;
        $MedicoAgendamiento->miercoles_close=$data->miercoles_close;
        $MedicoAgendamiento->jueves_open=$data->jueves_open;
        $MedicoAgendamiento->jueves_close=$data->jueves_close;
        $MedicoAgendamiento->viernes_open=$data->viernes_open;
        $MedicoAgendamiento->viernes_close=$data->viernes_close;
        $MedicoAgendamiento->sabado_open=$data->sabado_open;
        $MedicoAgendamiento->sabado_close=$data->sabado_close;
        $MedicoAgendamiento->domingo_open=$data->domingo_open;
        $MedicoAgendamiento->domingo_close=$data->domingo_close;

        $MedicoAgendamiento->update();
        return redirect('/AgendamientoMedico/'.$MedicoAgendamiento->id.'/edit');

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
