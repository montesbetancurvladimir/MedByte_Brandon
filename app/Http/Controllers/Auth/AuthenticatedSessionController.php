<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

//Modelos importados
use App\Models\User;

class AuthenticatedSessionController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }

    public function store(LoginRequest $request)
    {
        //Verifica si es la primera vez que ingresa el usuario al sistema
        $usuario = User::select('*')->where('email','=',$request['email'])->first();
        $usuario->contador = $usuario->contador +1;
        $usuario->save();
        $request->authenticate();
        $request->session()->regenerate();
        if($usuario->contador == 1){
            return redirect("Sucursales/index");
            //return view('auth.usuarios');
        }else{
            return redirect("Sucursales/index");
            //return redirect()->intended(RouteServiceProvider::HOME);
        }

    }

    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
