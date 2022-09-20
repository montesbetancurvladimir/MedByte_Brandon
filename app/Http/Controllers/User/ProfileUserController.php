<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\ProfileTeam;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\UserEmpresa;
use App\Models\TeamEmpresa;
use App\Models\TeamUser;
use App\Models\ProfileUser;
use App\Models\ProfileUserType;

class ProfileUserController extends Controller
{

    //Carga la vista principal con las tablas de usuarios y equipos.
    public function index()
    {
        $user_id = auth()->user()->id;
        //Consultar la empresa a la que pertenece el usuario.
        $UserEmpresa = UserEmpresa::select('*')->where([['user_id', '=', $user_id]])->first(); 

        //Mostrar los registros que corresponden al ID de esa empresa.
        $users = User::select('*')
        ->join('user_empresas','user_empresas.user_id','=','users.id')
        ->where([['user_empresas.empresa_id', '=', $UserEmpresa->empresa_id]])
        ->orderBy('users.id','desc')->paginate(15);

        //Cuenta la cantidad de usuarios por equipo.
        $cantidad_equipos = TeamUser::selectRaw('id_team, COUNT(*) AS numeroEquipos')->groupBy('id_team')->get();
        //dd($cantidad_equipos);

        //Mostrar los registros que corresponden al ID de esa empresa.
        $equipos = TeamEmpresa::select('id','id_empresa','description')->where([['team_empresas.id_empresa', '=', $UserEmpresa->empresa_id]])->get();
        return view('Configuracion_Inicial.Permisos.index',compact('users','equipos','cantidad_equipos'));
    }

    public function create()
    {

    }

    public function update_user(Request $request, User $User)
    {
        //Validar que si no se seleccionan registros, no salga el error.
        if(isset($request->permiso)){
            //Elimina los permisos del usuario, para actualizarlos por los nuevos que se le seleccionaron.
            ProfileUser::select('*')
            ->where([['user_id', '=', $User->id]])->delete(); 

            //Se le asignan los permisos nuevamente.
            $data = $request;
            for ($i=0; $i < count($data['permiso']); $i++) { 
                ProfileUser::create([
                    'user_id' =>$User->id,
                    'profile_user_type_id' => $data['permiso'][$i]
                ]);
            }
        }
        return redirect("Permisos/index");
    }

    public function update_team(Request $request, TeamEmpresa $TeamEmpresa)
    {
        //Elimina los permisos del equipo, para actualizarlos por los nuevos que se le seleccionaron.
        ProfileTeam::select('*')
        ->join('team_users','team_users.id_team','=','profile_teams.team_id')
        ->where([['team_id', '=', $TeamEmpresa->id]])->delete(); 

        //Se le asignan los permisos nuevamente.
        $data = $request;
        for ($i=0; $i < count($data['permiso']); $i++) { 
            ProfileTeam::create([
                'team_id' =>$TeamEmpresa->id,
                'profile_team_type_id' => $data['permiso'][$i]
            ]);
        }

        //Recupera los usuarios que pertenecen a ese equipo.
        $Usuarios_equipo = TeamUser::select('*')
        ->where([['id_team', '=', $TeamEmpresa->id]])->get(); 

        //Elimina los permisos que tienen esos usuarios, para actualizarlos con los nuevos.
        for ($i=0; $i < count($Usuarios_equipo); $i++) { 
            ProfileUser::select('*')
            ->where([['user_id', '=', $Usuarios_equipo[$i]['id_user']]])->delete(); 
        }

        //Se le asignan los mismos permisos que se le asignaron al equipo.
        for ($i=0; $i < count($Usuarios_equipo); $i++) { 
            for ($p=0; $p < count($data['permiso']); $p++) { 
                ProfileUser::create([
                    'user_id' => $Usuarios_equipo[$i]['id_user'],
                    'profile_user_type_id' => $data['permiso'][$p]
                ]);
            }
        }

        return redirect("Permisos/index");
    }

    public function show($id)
    {
        //
    }

    //Carga la vista para añadir permisos a un usuario en específico.
    public function edit(User $User)
    {
        //Contador de permisos que tiene ese usuario
        $count_permisos = ProfileUser::where('user_id', $User->id)->count(); 
        //Contador de permisos que tiene ese usuario
        $count_total_permisos = ProfileUserType::count(); 
        
        //Si el usuario no tiene permisos lo dirige a la vista de crear, sino a la vista de editar.
        if($count_permisos == 0){
            $TiposPermisos = ProfileUserType::get(); 
            return view('Configuracion_Inicial.Permisos.create',compact('User','TiposPermisos'));
        }else{
            $Permisos = ProfileUser::where('user_id', $User->id)->get(); 
            $TiposPermisos = ProfileUserType::get(); 
            //dd($Permisos[0]['id']);
            //dd($Permisos[0]['profile_user_type_id']);
            return view('Configuracion_Inicial.Permisos.edit',compact('User','Permisos','count_permisos','count_total_permisos','TiposPermisos'));
        }
    }

    //Carga la vista para añadir permisos a un equipo en específico.
    public function edit_equipos(TeamEmpresa $TeamEmpresa)
    {
        //Contador de permisos que tiene ese usuario
        $count_permisos = ProfileTeam::where('team_id', $TeamEmpresa->id)->count(); 
        //Contador de permisos que tiene ese usuario
        $count_total_permisos = ProfileUserType::count(); 
        
        //Si el usuario no tiene permisos lo dirige a la vista de crear, sino a la vista de editar.
        if($count_permisos == 0){
            $TiposPermisos = ProfileUserType::get(); 
            return view('Configuracion_Inicial.Permisos.create_equipos',compact('TeamEmpresa','TiposPermisos'));
        }else{
            $Permisos = ProfileTeam::where('team_id', $TeamEmpresa->id)->get(); 
            $TiposPermisos = ProfileUserType::get(); 
            //dd($Permisos[0]['id']);
            //dd($Permisos[0]['profile_user_type_id']);
            return view('Configuracion_Inicial.Permisos.edit_equipos',compact('TeamEmpresa','Permisos','count_permisos','count_total_permisos','TiposPermisos'));
        }
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
