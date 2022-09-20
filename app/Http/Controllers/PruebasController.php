<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//Modelos del select triple

use App\Models\CountryType;
use App\Models\DepartamentType;
use App\Models\CityType;

class PruebasController extends Controller
{
    //Devolver todas las categorias.
    public function index(){
        $paises = CountryType::all();
        //Se envía lo que recibe de categorias, se recibe en el select
        return view("pruebas",compact("paises"));
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
