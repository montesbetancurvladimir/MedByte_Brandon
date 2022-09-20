<?php

namespace App\Http\Controllers\TeamEmpresa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TeamEmpresa;
use App\Models\TeamUser;
use App\Models\UserEmpresa;
use App\Models\User;

//Clases para trabajar el importar.
use App\Imports\CsvImportEquipos;
use Excel;

class TeamEmpresaController extends Controller
{

    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(TeamEmpresa $TeamEmpresa, Request $request)
    {
       
    }

    public function show($id)
    {
        //
    }
    
    public function edit(TeamEmpresa $TeamEmpresa)
    {
        $user_id = auth()->user()->id;
        //Consultar la empresa a la que pertenece el usuario.
        $UserEmpresa = UserEmpresa::select('*')->where([['user_id', '=', $user_id]])->first(); 

        //Conusltar los Usuarios que pertenecen a esa empresa.
        $users = User::select('*')
        ->join('user_empresas','user_empresas.user_id','=','users.id')
        ->where([['user_empresas.empresa_id', '=', $UserEmpresa->empresa_id]])
        ->orderBy('users.id','desc')->paginate(15);

        //Mostrar los registros que corresponden al ID de esa empresa.
        $equipos = TeamEmpresa::select('id','id_empresa','description')->where([['team_empresas.id_empresa', '=', $UserEmpresa->empresa_id]])->get();

        //Cuenta la cantidad de usuarios por equipo.
        $cantidad_equipos = TeamUser::selectRaw('id_team, COUNT(*) AS numeroEquipos')->groupBy('id_team')->get();

        //Usuarios que pertenecen a ese equipo.
        $UsersTeam = TeamUser::select('*')
        ->join('users','users.id','=','team_users.id_user')
        ->where([['id_team', '=', $TeamEmpresa->id]])->get(); 

        return view('auth.editar-equipos',compact('users','equipos','cantidad_equipos','TeamEmpresa','UsersTeam'));
    }

    public function update(TeamEmpresa $TeamEmpresa, Request $request)
    {
        //Usuarios que pertenecen a ese equipo.
        //Elimina esos usuarios, en caso tal de que se haya agregado alguien más o eliminado alguien de ese equipo.
        TeamUser::select('*')
        ->join('users','users.id','=','team_users.id_user')
        ->where([['id_team', '=', $TeamEmpresa->id]])->delete(); 

        //Asigna nuevamente los usuarios al equipo.
        for ($i=0; $i < count($request['equipo']); $i++) { 
            TeamUser::create([
                'id_team' => $TeamEmpresa->id,
                'id_user' => $request['equipo'][$i]
            ]);
        }
        $request->session()->flash('status','Registro actualizado correctamente.');
        return redirect("TeamEmpresa/".$TeamEmpresa->id."/edit");
    }

    public function destroy($id)
    {
        //
    }

    public function plantilla()
    {
        return view('auth.plantilla-equipos');
    }

    public function importar(Request $request){

        $user_id = auth()->user()->id;
        $userEmpresa = UserEmpresa::where('user_id', $user_id)->first();

        //Validamos que se haya subido un documento.
        if($request->hasFile('documento')){
            //Estamos obteniendo la ruta.
            $path = $request->file('documento')->getRealPath();
            //Se almacena la informacion en la variable datos.
            //$datos = Excel::import(new CsvImport, $path);
            $datos = Excel::toArray(new CsvImportEquipos,$request->file('documento'))[0];
            //Validar que tenga datos.
            if(!empty($datos)){
                //Se convierten los datos en un arreglo.
                //$datos = $datos->toArray();
                for ($p=0; $p < count($datos); $p++) { 
                    for ($i=0; $i < count($datos); $i++) { 
                        $data=array_merge(
                            ['id_empresa'=>$userEmpresa->empresa_id],
                            ['description'=>$datos[$p][0]]
                        );
                    } 
                    TeamEmpresa::create($data);
                    //Traer el ultimo ID del equipo creado
                    $ultimo_registro = TeamEmpresa::select('id')->orderBy('id', 'desc')->first();
                    //Le asigna un usuario, porque si el equipo queda vacio, no lo muestra en las tablas.
                    $data_user=array_merge(
                        ['id_team'=>$ultimo_registro->id],
                        ['id_user'=>$user_id]
                    );
                    TeamUser::create($data_user);
                }
                
            }
            $request->session()->flash('status','Registro masivo exitoso.');
            return redirect("User/index");
        }
        //Ser redirigidos a la misma página.
        return back();
    }

}
