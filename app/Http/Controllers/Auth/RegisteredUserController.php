<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserEmpresa;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function create_user()
    {
        return view('auth.register_user');
    }

    public function create_user_admin()
    {
        $users = User::select('*')
        ->orderBy('id','desc')
        ->paginate(15);
        return view('auth.usuarios',compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre1' => ['required', 'string', 'max:255'],
            'nombre2' => ['required', 'string', 'max:255'],
            'apellido1' => ['required', 'string', 'max:255'],
            'apellido2' => ['required', 'string', 'max:255'],
            'celular' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
        $user = User::create([
            'nombre1' => $request->nombre1,
            'nombre2' => $request->nombre2,
            'apellido1' => $request->apellido1,
            'apellido2' => $request->apellido2,
            'celular' => $request->celular,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        event(new Registered($user));
        Auth::login($user);
        return redirect(RouteServiceProvider::HOME);
    }

    public function store_user(Request $request){
        $request->validate([
            'nombre1' => ['required', 'string', 'max:255'],
            'nombre2' => ['required', 'string', 'max:255'],
            'apellido1' => ['required', 'string', 'max:255'],
            'apellido2' => ['required', 'string', 'max:255'],
            'celular' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
        $user = User::create([
            'nombre1' => $request->nombre1,
            'nombre2' => $request->nombre2,
            'apellido1' => $request->apellido1,
            'apellido2' => $request->apellido2,
            'celular' => $request->celular,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        event(new Registered($user));
        Auth::login($user);
        return redirect(RouteServiceProvider::HOME);
    }

    public function store_user_admin(Request $request){

        $user_id = auth()->user()->id;
        $userEmpresa = UserEmpresa::where('user_id', $user_id)->first();

        $request->validate([
            'nombre1' => ['required', 'string', 'max:255'],
            'nombre2' => ['required', 'string', 'max:255'],
            'apellido1' => ['required', 'string', 'max:255'],
            'apellido2' => ['required', 'string', 'max:255'],
            'celular' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'nombre1' => $request->nombre1,
            'nombre2' => $request->nombre2,
            'apellido1' => $request->apellido1,
            'apellido2' => $request->apellido2,
            'celular' => $request->celular,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $empresa = UserEmpresa::create([
            'user_id' => $user_id,
            'empresa_id' => $userEmpresa->empresa_id,
        ]);


        return view('auth.crear-usuarios');
    }
    
}
