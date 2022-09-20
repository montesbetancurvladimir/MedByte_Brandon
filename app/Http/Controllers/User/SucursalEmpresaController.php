<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\SucursalEmpresa;
use App\Models\UserEmpresa;

use App\Models\CountryType;
use App\Models\CityType;
use App\Models\DepartamentType;


class SucursalEmpresaController extends Controller
{
    public function index()
    {
        $user_id = auth()->user()->id;
        //dd($user_id);
        //Consultar la empresa a la que pertenece el usuario.
        $UserEmpresa = UserEmpresa::select('*')->where([['user_id', '=', $user_id]])->first(); 
        //Mostrar los registros que corresponden al ID de esa empresa.
        $Sucursales = SucursalEmpresa::select('*')->where([['empresa_id', '=', $UserEmpresa->empresa_id]])->get();

        return view('Configuracion_Inicial.Sucursales.index',compact('Sucursales'));
    }

    public function create()
    {
        $paises = CountryType::all();
        return view('Configuracion_Inicial.Sucursales.create',compact('paises'));
    }

    public function store(Request $request)
    {
        $data = $request;
        $user_id = auth()->user()->id;
        //Consultar la empresa a la que pertenece el usuario.
        $UserEmpresa = UserEmpresa::select('*')->where([['user_id', '=', $user_id]])->first(); 

        //Ultimo registro de las sucursales +1
        $ultimo_registro_sucursal = SucursalEmpresa::select('id')->orderBy('id', 'desc')->first();
        $sucursal =  $ultimo_registro_sucursal->id + 1;

        //Código para guardar los archivos LOGOS
        if(isset($data["logo"]) == true){          
            $logo = request()->file('logo');
            $ruta = "logos/".$sucursal;
            $logoName = time() . '.' . $logo->getClientOriginalExtension();
            $logoPath = $ruta."/".$logoName;
            if (!file_exists($logoPath)) {
                mkdir($logoPath, 0777, true);
            }
            $logo->move($logoPath, $logoName);
        }else{
            $logoPath = "logos/default/default_logo.png";
        }

        //Código para guardar los archivos IMAGEN SEDE
        if(isset($data["sede"]) == true){            
            $sede = request()->file('sede');
            $ruta = "sedes/".$sucursal;
            //lE AÑADE EL NOMBRE Y LA EXTENSIÓN
            $sedeName = time() . '.' . $sede->getClientOriginalExtension();
            $sedePath = $ruta."/".$sedeName;
            //CREA LA CARPETA
            if (!file_exists($sedePath)) {
                mkdir($sedePath, 0777, true);
            }
            //MUEVE EL ARCHIVO
            $sede->move($sedePath, $sedeName);
        }else{
            $sedePath = "sedes/default/default_sede.png";
        }
        
        //Crea el servicio
        SucursalEmpresa::create([
            'empresa_id' =>$UserEmpresa->empresa_id,
            'descripcion'=>$request->descripcion,
            'pais'=>$request->pais,
            'municipio'=>$request->municipio,
            'ciudad'=>$request->ciudad,
            'direccion'=>$request->direccion,
            'telefono'=>$request->telefono,
            'tipo_documento'=>$request->tipo_documento,
            'documento'=>$request->documento,
            'razon_social'=>$request->razon_social,
            'logo'=>$logoPath,
            'sede'=>$sedePath,
            'estado_sede'=>$request->estado_sede,
            'tipo_sede'=>$request->tipo_sede,
            'user_id'=>$user_id
        ]);

        return redirect("Sucursales/index");
    }

    public function edit(SucursalEmpresa $SucursalEmpresa){
        $paises = CountryType::all();
        $departamentos = DepartamentType::all();
        $municipios = CityType::all();
        return view('Configuracion_Inicial.Sucursales.edit',compact('SucursalEmpresa','paises','departamentos','municipios'));
    }

    public function update(Request $request, SucursalEmpresa $SucursalEmpresa)
    {
        $SucursalEmpresa = SucursalEmpresa::find($SucursalEmpresa->id);
        $sucursal =  $SucursalEmpresa->id;

        //Código para guardar los archivos LOGOS
        if(isset($request["logo"]) == true){          
            $logo = request()->file('logo');
            $ruta = "logos/".$sucursal;
            $logoName = time() . '.' . $logo->getClientOriginalExtension();
            $logoPath = $ruta."/".$logoName;
            if (!file_exists($logoPath)) {
                mkdir($logoPath, 0777, true);
            }
            $logo->move($logoPath, $logoName);
        }else{
            //si no cargo archivo, deja el mismo.
            $logoPath = $SucursalEmpresa->logo;
        }

        //Código para guardar los archivos IMAGEN SEDE
        if(isset($request["sede"]) == true){            
            $sede = request()->file('sede');
            $ruta = "sedes/".$sucursal;
            $sedeName = time() . '.' . $sede->getClientOriginalExtension();
            $sedePath = $ruta."/".$sedeName;
            if (!file_exists($sedePath)) {
                mkdir($sedePath, 0777, true);
            }
            $sede->move($sedePath, $sedeName);
        }else{
            //si no cargo archivo, deja el mismo.
            $sedePath = $SucursalEmpresa->sede;
        }

        //Atributos a ACTUALIZAR.
        $SucursalEmpresa->descripcion = $request->descripcion;
        $SucursalEmpresa->pais = $request->tipo_pais_id;
        $SucursalEmpresa->municipio = $request->tipo_departamento_id;
        $SucursalEmpresa->ciudad = $request->tipo_ciudad_id;
        $SucursalEmpresa->direccion = $request->direccion;
        $SucursalEmpresa->telefono = $request->telefono;
        $SucursalEmpresa->tipo_documento = $request->tipo_documento;
        $SucursalEmpresa->documento = $request->documento;
        $SucursalEmpresa->razon_social = $request->razon_social;
        $SucursalEmpresa->logo = $logoPath;
        $SucursalEmpresa->sede = $sedePath;
        $SucursalEmpresa->estado_sede = $request->estado_sede;
        $SucursalEmpresa->tipo_sede = $request->tipo_sede;

        $SucursalEmpresa->save();
        return redirect("Sucursales/index");
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
