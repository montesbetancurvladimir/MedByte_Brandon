<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use App\Models\User;
use App\Models\UserEmpresa;
use App\Models\TeamEmpresa;
use App\Models\TeamUser;
use App\Models\ProfileUser;
use App\Models\ProfileUserType;
use App\Models\ServicioEmpresa;
use App\Models\ServicioEquipo;
use App\Models\ServicioUsuario;
use App\Models\SucursalEmpresa;


class ServicioController extends Controller
{

    public function index()
    {
        //Validar que sean los servicios propios de esa empresa.
        $user_id = auth()->user()->id;
        //dd($user_id);
        //Consultar la empresa a la que pertenece el usuario.
        $UserEmpresa = UserEmpresa::select('*')->where([['user_id', '=', $user_id]])->first(); 
        //Mostrar los registros que corresponden al ID de esa empresa.
        $Servicios = ServicioEmpresa::select('*')->where([['empresa_id', '=', $UserEmpresa->empresa_id]])->get();

        return view('Configuracion_Inicial.Servicios.index',compact('Servicios'));
    }

    public function create()
    {

        $user_id = auth()->user()->id;

        //Consultar la empresa a la que pertenece el usuario.
        $UserEmpresa = UserEmpresa::select('*')->where([['user_id', '=', $user_id]])->first(); 

        //Conusltar los Usuarios que pertenecen a esa empresa.
        //Mostrar los registros que corresponden al ID de esa empresa.
        $users = User::select('*')
        ->join('user_empresas','user_empresas.user_id','=','users.id')
        ->where([['user_empresas.empresa_id', '=', $UserEmpresa->empresa_id]])
        ->orderBy('users.id','desc')->paginate(15);

        //Envío las sucursales registradas
        //Falta validar que carguen solo las de la empresa.
        //$sucursales = SucursalEmpresa::pluck('id','descripcion')->where([['empresa_id', '=', $UserEmpresa->empresa_id]]);
        $sucursales = SucursalEmpresa::select('id','descripcion')->where([['empresa_id', '=', $UserEmpresa->empresa_id]])->get();
        //dd($sucursales);

        //Mostrar los registros que corresponden al ID de esa empresa.
        $equipos = TeamEmpresa::select('id','id_empresa','description')->where([['team_empresas.id_empresa', '=', $UserEmpresa->empresa_id]])->get();
        
        return view('Configuracion_Inicial.Servicios.create',compact('users','equipos','sucursales'));
    }

    public function store(Request $request)
    {
        //dd($request);
        $data = $request;
        $user_id = auth()->user()->id;
        //Consultar la empresa a la que pertenece el usuario.
        $UserEmpresa = UserEmpresa::select('*')->where([['user_id', '=', $user_id]])->first(); 

        //Crea el servicio
        ServicioEmpresa::create([
            'nombre_servicio' =>$data->nombre_servicio,
            'duracion' => $data->duracion,
            'sucursal_id' =>$data->sucursal,
            'empresa_id' =>$UserEmpresa->empresa_id,
        ]);

        //Consulta el Id del servicio creado para añadirlo a los nuevos.
        $ultimo_registro_servicio = ServicioEmpresa::select('id')->orderBy('id', 'desc')->first();

        //Crea los servicios de los usuarios
        for ($i=0; $i < count($data['usuarios']); $i++) { 
            ServicioUsuario::create([
                'servicio_id' =>$ultimo_registro_servicio->id,
                'user_id' => $data['usuarios'][$i]
            ]);
        }
        //Crea los servicios de los equipos
        for ($i=0; $i < count($data['equipos']); $i++) { 
            ServicioEquipo::create([
                'servicio_id' =>$ultimo_registro_servicio->id,
                'team_id' => $data['equipos'][$i]
            ]);
        }

        return redirect("Servicios/index");
    }
    public function show($id)
    {
        //
    }

    public function edit(ServicioEmpresa $ServicioEmpresa)
    {

        //dd($ServicioEmpresa);
        $user_id = auth()->user()->id;
        $UserEmpresa = UserEmpresa::select('*')->where([['user_id', '=', $user_id]])->first();

        //Envío las sucursales registradas
        //Falta validar que carguen solo las de la empresa.
        $sucursales = SucursalEmpresa::pluck('id','descripcion');

        //Conusltar los Usuarios que pertenecen a esa empresa.
        $Usuarios = User::select('*')
        ->join('user_empresas','user_empresas.user_id','=','users.id')
        ->where([['user_empresas.empresa_id', '=', $UserEmpresa->empresa_id]])
        ->orderBy('users.id','desc')->get();

        //Consultar la empresa a la que pertenece el usuario.
        $UserEmpresa = UserEmpresa::select('*')->where([['user_id', '=', $user_id]])->first(); 

        //Contar todos los usuarios que son de esa empresa. FALTA
        $count_user = User::select('*')
            ->join('user_empresas','user_empresas.user_id','=','users.id')
            ->where([['user_empresas.empresa_id', '=', $UserEmpresa->empresa_id]])
            ->orderBy('users.id','desc')->count();

        //Número de equipos que pertenecen a esa empresa
        $count_equipo = TeamEmpresa::select('id','id_empresa','description')->where([['team_empresas.id_empresa', '=', $UserEmpresa->empresa_id]])->count();
       
        $Equipos = TeamEmpresa::select('id','id_empresa','description')->where([['team_empresas.id_empresa', '=', $UserEmpresa->empresa_id]])->get();

        //Usuarios que pertenecen a ese servicio para mostrar en la tabla.
        $Usuarios_servicios = User::select('*')
        ->join('servicio_usuarios','servicio_usuarios.user_id','=','users.id')
        ->where([['servicio_usuarios.servicio_id', '=', $ServicioEmpresa->id]])
        ->get();

        return view('Configuracion_Inicial.Servicios.edit',
        compact('sucursales','ServicioEmpresa','count_user','Usuarios','Equipos','count_equipo','Usuarios_servicios'));
    }

    public function update(Request $request,  ServicioEmpresa $ServicioEmpresa)
    {
        //Elimina los permisos del usuario, para actualizarlos por los nuevos que se le seleccionaron.
        $data = $request;

        //Elimino los usuarios que estan asociados a ese servicio.
        ServicioUsuario::select('*')
        ->where([
            ['servicio_id', '=', $ServicioEmpresa->id],
        ])->delete(); 
        
        //Crea los servicios de los usuarios.
        for ($i=0; $i < count($data['usuarios']); $i++) { 
            ServicioUsuario::create([
                'servicio_id' =>$ServicioEmpresa->id,
                'user_id' => $data['usuarios'][$i]
            ]);
        }

        ServicioEquipo::select('*')
        ->where([
            ['servicio_id', '=', $ServicioEmpresa->id],
        ])->delete(); 

        //Crea los servicios de los equipos.
        for ($i=0; $i < count($data['equipos']); $i++) { 
            ServicioEquipo::create([
                'servicio_id' =>$ServicioEmpresa->id,
                'team_id' => $data['equipos'][$i]
            ]);
        }
        

        return redirect("Servicios/".$ServicioEmpresa->id."/edit");
    }

    public function destroy($id)
    {
        //
    }
}
