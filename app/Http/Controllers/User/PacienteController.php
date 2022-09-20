<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Paciente;
use App\Models\UserEmpresa;
use App\Models\TipoDocumento;

use App\Models\CountryType;
use App\Models\DepartamentType;
use App\Models\CityType;
use App\Models\DatoContacto;
use App\Models\NaturalPersona;

class PacienteController extends Controller
{
    public function index(){
        return view('Configuracion_Inicial.Pacientes.index');
    }

    public function index_pacientes()
    {
    //Validar que sean los servicios propios de esa empresa.
    $user_id = auth()->user()->id;
    //dd($user_id);
    //Consultar la empresa a la que pertenece el usuario.
    $UserEmpresa = UserEmpresa::select('*')->where([['user_id', '=', $user_id]])->first(); 
    //Mostrar los registros que corresponden al ID de esa empresa.
    $Pacientes = NaturalPersona::select('*')
    ->join('pacientes','pacientes.natural_id','=','natural_personas.id')
    ->where([['empresa_id', '=', $UserEmpresa->empresa_id]])->get();

    return view('Configuracion_Inicial.Pacientes.index-pacientes',compact('Pacientes'));
    }

    public function create()
    {   
        $paises = CountryType::all();
        $tipo_documento_id = TipoDocumento::pluck('id','descripcion');
        return view('Configuracion_Inicial.Pacientes.create',compact('tipo_documento_id','paises'));
    }

    public function store(Request $request)
    {
        //dd($request);
        $data = $request;
        $user_id = auth()->user()->id;
        //Consultar la empresa a la que pertenece el usuario.
        $UserEmpresa = UserEmpresa::select('*')->where([['user_id', '=', $user_id]])->first(); 

        NaturalPersona::create([
            'tipo_documento_id' =>$request->tipo_documento_id,
            'documento'=>$request->numero_id,
            'fecha_nacimiento'=>$request->fecha_nacimiento,
            'nombre1'=>$request->nombre1,
            'nombre2'=>$request->nombre2,
            'apellido1'=>$request->apellido1,
            'apellido2'=>$request->apellido2,
            'genero'=>$request->genero,
            'tipo_sangre'=>$request->tipo_sangre
        ]);

        //Ultimo registro de la persona.
        $ultimo_registro_persona = NaturalPersona::select('id')->orderBy('id', 'desc')->first();

        Paciente::create([
            'natural_id' =>$ultimo_registro_persona->id,
            'empresa_id'=>$UserEmpresa->empresa_id
        ]);

        //Telefono
        DatoContacto::create([
            'tipo_contacto_id' =>3,
            'natural_id' =>$ultimo_registro_persona->id,
            'descripcion'=>$request->telefono
        ]);

        //Email
        DatoContacto::create([
            'tipo_contacto_id' =>1,
            'natural_id' =>$ultimo_registro_persona->id,
            'descripcion'=>$request->email
        ]);

        //Direccion
        DatoContacto::create([
            'tipo_contacto_id' =>2,
            'natural_id' =>$ultimo_registro_persona->id,
            'descripcion'=>$request->direccion,
            'pais_id'=>$request->pais,
            'departamento_id'=>$request->municipio,
            'municipio_id'=>$request->ciudad,
        ]);

        $Pacientes = Paciente::select('*')->where([['empresa_id', '=', $UserEmpresa->empresa_id]])->get();
        return redirect("Pacientes/usuarios");
    }

    public function edit(Paciente $Paciente)
    {  
        //Trae los datos con NaturalPersona
        $Paciente = NaturalPersona::select('*')
        ->join('pacientes','pacientes.natural_id','=','natural_personas.id')
        ->where([
            ['natural_id', '=', $Paciente->natural_id],
            ])->first();

        $Telefono = DatoContacto::select('*')->where([
            ['natural_id', '=', $Paciente->natural_id],
            ['tipo_contacto_id', '=', 3],
            ])->first();
        
        $Correo = DatoContacto::select('*')->where([
            ['natural_id', '=', $Paciente->natural_id],
            ['tipo_contacto_id', '=', 1],
            ])->first();

        $Direccion = DatoContacto::select('*')->where([
            ['natural_id', '=', $Paciente->natural_id],
            ['tipo_contacto_id', '=', 2],
            ])->first();

        $paises = CountryType::all();
        $departamentos = DepartamentType::all();
        $municipios = CityType::all();
        $tipo_documento_id = TipoDocumento::pluck('id','descripcion');
        return view('Configuracion_Inicial.Pacientes.edit',compact('tipo_documento_id','paises','departamentos','municipios','Paciente','Telefono','Correo','Direccion'));
    }

    public function departamentos(Request $request){
        //Si existe una variable 'texto', realiza la consulta la tabla subcategoria que coincida con ese criterio.
        if(isset($request->texto)){
            //Traer lo que coincida con el ID de categoria.
            $departamentos = DepartamentType::where('country_type_id',$request->texto)->get(); 
            //recibe un array y lo organizamos.
            return response()->json(
                [
                    'lista' => $departamentos,
                    'success' => true
                ]
                );
        //Si no hay datos.
        }else{
            return response()->json(
                [
                    'success' => false
                ]  
            );
        }
    }
    
    //Se realiza el mismo procedimiento para el tercer Select.
    public function municipios(Request $request){
        if(isset($request->texto)){
            $municipios = CityType::where('departament_type_id',$request->texto)->get(); 
            return response()->json(
                [
                    'lista' => $municipios,
                    'success' => true
                ]
                );
        }else{
            return response()->json(
                [
                    'success' => false
                ]
                );

        }

    }


    
}
