<?php

namespace App\Http\Controllers\User;

//Validadores
use App\Http\Requests\Usuario\StoreRequest;
use App\Http\Requests\Usuario\PutRequest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;

use Illuminate\Support\Facades\Hash;

use App\Models\User;
use App\Models\UserEmpresa;
use App\Models\TeamEmpresa;
use App\Models\TipoDocumento;
use App\Models\TeamUser;

use App\Imports\CsvImportUsuarios;
use Excel;


class UserController extends Controller
{
    //Carga la vista principal donde se ven los usuarios y los equipos.
    public function index(Request $request)
    {
        $user_id = auth()->user()->id;
        //Consultar la empresa a la que pertenece el usuario.
        $UserEmpresa = UserEmpresa::select('*')->where([['user_id', '=', $user_id]])->first(); 

        //Mostrar los registros que corresponden al ID de esa empresa.
        $users = User::select('*')
        ->join('user_empresas','user_empresas.user_id','=','users.id')
        ->where([['user_empresas.empresa_id', '=', $UserEmpresa->empresa_id]])
        ->orderBy('users.id','desc')->paginate(15);

        //Mostrar los registros que corresponden al ID de esa empresa.
        $equipos = TeamEmpresa::select('id','id_empresa','description')->where([['team_empresas.id_empresa', '=', $UserEmpresa->empresa_id]])->get();
        
        //Cuenta la cantidad de usuarios por equipo.
        $cantidad_equipos = TeamUser::selectRaw('id_team, COUNT(*) AS numeroEquipos')
        ->join('team_empresas','team_empresas.id','=','team_users.id_team')
        ->where([['team_empresas.id_empresa', '=', $UserEmpresa->empresa_id]])
        ->groupBy('id_team')->get();


        return view('auth.usuarios',compact('users','equipos','cantidad_equipos'));
    }

    //Metodo que llama la vista para cargar el archivo plano.
    public function plantilla()
    {
        return view('auth.plantilla-usuarios');
    }

    //Carga la vista para crear usuarios
        //Carga la vista para crear usuarios
        public function create(){
            $user_id = auth()->user()->id;
            //Consultar la empresa a la que pertenece el usuario.
            $UserEmpresa = UserEmpresa::select('*')->where([['user_id', '=', $user_id]])->first(); 
    
            $tipo_documento_id = TipoDocumento::pluck('id','descripcion');
            $equipos = TeamEmpresa::select('*')
            ->where([
                ['team_empresas.id_empresa', '=', $UserEmpresa->empresa_id],
            ])->pluck('id','description');
            return view('auth.crear-usuarios',compact('equipos','tipo_documento_id'));
        }
    public function create_equipos(){
        $user_id = auth()->user()->id;

        //Consultar la empresa a la que pertenece el usuario.
        $UserEmpresa = UserEmpresa::select('*')->where([['user_id', '=', $user_id]])->first(); 

       //Conusltar los Usuarios que pertenecen a esa empresa.
       //Mostrar los registros que corresponden al ID de esa empresa.
       $users = User::select('*')
       ->join('user_empresas','user_empresas.user_id','=','users.id')
       ->where([['user_empresas.empresa_id', '=', $UserEmpresa->empresa_id]])
       ->orderBy('users.id','desc')->paginate(15);

        //Mostrar los registros que corresponden al ID de esa empresa.
        $equipos = TeamEmpresa::select('id','id_empresa','description')->where([['team_empresas.id_empresa', '=', $UserEmpresa->empresa_id]])->get();
        //Cuenta la cantidad de usuarios por equipo.
        $cantidad_equipos = TeamUser::selectRaw('id_team, COUNT(*) AS numeroEquipos')->groupBy('id_team')->get();
        //dd($cantidad_equipos);
        return view('auth.crear-equipos',compact('users','equipos','cantidad_equipos'));
    }


    public function store(StoreRequest $request)
    {
        $user_id = auth()->user()->id;
        $userEmpresa = UserEmpresa::where('user_id', $user_id)->first();

        //dd($request);

        if (request()->has('foto_perfil')) {            
            $avatar = request()->file('foto_perfil');
            $avatarName = time() . '.' . $avatar->getClientOriginalExtension();
            $avatarPath = public_path('/avatares/');
            $avatar->move($avatarPath, $avatarName);
        }

        User::create([
            'tipo_documento_id' => $request->tipo_documento_id,
            'nombre1' => $request->nombre1,
            'nombre2' => $request->nombre2,
            'apellido1' => $request->apellido1,
            'apellido2' => $request->apellido2,
            'celular' => $request->celular,
            'email' => $request->email,
            'numero_id' => $request->numero_id,
            'tarjeta_profesional' => $request->tarjeta_profesional,
            'foto_perfil' => "/avatares/".$avatarName,
            'password' => Hash::make($request->password),
        ]);

        //Trae el último registro del usuario.
        $ultimo_registro = User::select('id')->orderBy('id', 'desc')->first();

        UserEmpresa::create([
            'user_id' => $ultimo_registro->id,
            'empresa_id' => $userEmpresa->empresa_id,
        ]);

        $request->session()->flash('status','Registro creado correctamente.');
        return redirect("User/index");

    }

    public function store_equipos(Request $request)
    {
        //Validar que el equipo tenga usuarios asignados, sino entonces le asigna por defecto el usuario admin.
        $user_id = auth()->user()->id;
        $userEmpresa = UserEmpresa::where('user_id', $user_id)->first();
        if(isset($request['equipo'])){
            $data = array_merge($request->all(),['id_empresa' => $userEmpresa->empresa_id]);
            TeamEmpresa::create([
                'id_empresa' => $data['id_empresa'],
                'description' => $data['nombre_equipo']
            ]);
            $ultimo_registro_equipo = TeamEmpresa::select('id')->orderBy('id', 'desc')->first();
            for ($i=0; $i < count($data['equipo']); $i++) { 
                TeamUser::create([
                    'id_team' => $ultimo_registro_equipo->id,
                    'id_user' => $data['equipo'][$i]
                ]);
            }
        }else{
            $data = array_merge($request->all(),['id_empresa' => $userEmpresa->empresa_id]);
            TeamEmpresa::create([
                'id_empresa' => $data['id_empresa'],
                'description' => $data['nombre_equipo']
            ]);
            $ultimo_registro_equipo = TeamEmpresa::select('id')->orderBy('id', 'desc')->first();
            $data_user=array_merge(
                ['id_team'=>$ultimo_registro_equipo->id],
                ['id_user'=>$user_id]
            );
            //Le asigna el usuario admin a ese equipo
            TeamUser::create($data_user);
        }
        $request->session()->flash('status','Registro creado correctamente.');
        return redirect("User/index");
    }

    public function show($id)
    {
        //
    }
    
    public function edit(User $User)
    {
        $tipo_documento_id = TipoDocumento::pluck('id','descripcion');
        return view('auth.editar-usuarios',compact('User','tipo_documento_id'));
    }

    public function edit_equipos(User $User)
    {
        $tipo_documento_id = TipoDocumento::pluck('id','descripcion');
        return view('auth.editar-usuarios',compact('User','tipo_documento_id'));
    }

    public function update(PutRequest $request, User $User)
    {
        //dd($NaturalPersona);
        $User->update($request->validated());
        //No tiene error. Error de VSC.
        $request->session()->flash('status','Registro actualizado correctamente.');
        return redirect("User/index");
        //Forma 2 - Mensaje de ruta.
        //return redirect("NaturalPersona/index")->with('status','Registro actualizado correctamente.');
    }

    public function update_refused(Request $request, User $User)
    {

    }

    public function destroy($id)
    {
        //
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
            $datos = Excel::toArray(new CsvImportUsuarios,$request->file('documento'))[0];
            //Validar que tenga datos.
            if(!empty($datos)){
                //Se convierten los datos en un arreglo.
                //$datos = $datos->toArray();
                for ($p=0; $p < count($datos); $p++) { 
                    for ($i=0; $i < count($datos); $i++) { 
                        $data=array_merge(
                            ['tipo_documento_id'=>$datos[$p][0]],
                            ['nombre1'=>$datos[$p][1]],
                            ['nombre2'=>$datos[$p][2]],
                            ['apellido1'=>$datos[$p][3]],
                            ['apellido2'=>$datos[$p][4]],
                            ['celular'=>$datos[$p][5]],
                            ['email'=>$datos[$p][6]],
                            ['password'=>$datos[$p][7]],
                            ['numero_id'=>$datos[$p][8]],
                            ['tarjeta_profesional'=>$datos[$p][9]],
                            ['activo'=>'1'],
                            ['contador'=>'0'],
                        );
                    } 
                    User::create($data);
                    UserEmpresa::create([
                        'user_id' => $user_id,
                        'empresa_id' => $userEmpresa->empresa_id,
                    ]);
                }
                
            }
            $request->session()->flash('status','Registro masivo exitoso.');
            return redirect("User/index");
        }
        //Ser redirigidos a la misma página.
        return back();
    }
}
