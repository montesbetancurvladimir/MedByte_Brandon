<?php

namespace App\Http\Controllers\Empresa;

//Validadores
use App\Http\Requests\Empresa\StoreRequest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Empresa;

//Modelos del select triple
use App\Models\CountryType;
use App\Models\DepartamentType;
use App\Models\CityType;
use App\Models\TipoDocumentoEmpresa;

class EmpresaController extends Controller
{
    //Devolver todas las categorias.
    public function create(){
        $paises = CountryType::all();
        $tipo_documento_empresa_id = TipoDocumentoEmpresa::pluck('id','descripcion');
        //Se envía lo que recibe de categorias, se recibe en el select
        return view("Empresa.create",compact('paises','tipo_documento_empresa_id'));
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $data = array_merge($request->all());
        Empresa::create($data);
        return redirect("/dashboard");
    }

    public function show($id)
    {
        //
    }
    public function edit($id)
    {
        //
    }

    public function update(Request $request, Empresa $Empresa)
    {
    }

    public function update_refused(Request $request, Empresa $Empresa)
    {

    }

    public function destroy($id)
    {
        //
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
