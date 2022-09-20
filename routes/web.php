<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Empresa\EmpresaController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\TeamEmpresa\TeamEmpresaController;
use App\Http\Controllers\User\ProfileUserController;
use App\Http\Controllers\User\ServicioController;
use App\Http\Controllers\User\SucursalEmpresaController;
use App\Http\Controllers\User\PacienteController;
use App\Http\Controllers\Agendamiento\InstitucionesController;
use App\Http\Controllers\Agendamiento\MedicosController;
use App\Http\Controllers\Agendamiento\CanalesController;

//Rutas módulo de agendamiento.
Route::get('/Agendamiento/instituciones', [InstitucionesController::class,'index'])->name('Instituciones.index');
Route::post('/Agendamiento/instituciones_store', [InstitucionesController::class,'store'])->name('Instituciones.store');
Route::get('/Agendamiento/{InstitucionAgendamiento}/edit', [InstitucionesController::class,'edit'])->name('Instituciones.edit');
Route::put('/Agendamiento/{InstitucionAgendamiento}', [InstitucionesController::class,'update'])->name('Instituciones.update');

Route::get('/Agendamiento/medicos', [MedicosController::class,'index'])->name('Medicos.index');
Route::post('/Agendamiento/medicos_store', [MedicosController::class,'store'])->name('Medicos.store');
Route::get('/AgendamientoMedico/{MedicoAgendamiento}/edit', [MedicosController::class,'edit'])->name('Medicos.edit');
Route::put('/AgendamientoMedico/{MedicoAgendamiento}', [MedicosController::class,'update'])->name('Medicos.update');

Route::get('/Canales/index', [CanalesController::class,'index'])->name('Canales.index');

//Rutas historias clinicas.
Route::get('/HistoriaClinica/index', [HistoriaClinicaController::class,'index'])->name('HistoriaClinica.index');
Route::get('/HistoriaClinica/create', [HistoriaClinicaController::class,'create'])->name('HistoriaClinica.create');
Route::post('/HistoriaClinica/store', [HistoriaClinicaController::class,'store'])->name('HistoriaClinica.store');

//Rutas pacientes.
Route::get('/Pacientes/usuarios', [PacienteController::class,'index_pacientes'])->name('Pacientes.index_pacientes');
Route::get('/Pacientes/index', [PacienteController::class,'index'])->name('Pacientes.index');
Route::get('/Pacientes/create', [PacienteController::class,'create'])->name('Pacientes.create');
Route::post('/Pacientes/store', [PacienteController::class,'store'])->name('Pacientes.store');
Route::get('/Pacientes/{Paciente}/edit', [PacienteController::class,'edit'])->name('Pacientes.edit');
//Pacientes select triple
Route::post('/Pacientes/departamentos', [PacienteController::class, 'departamentos']);
Route::post('/Pacientes/municipios', [PacienteController::class, 'municipios']);
Route::post('/Pacientes/{Paciente}/departamentos', [PacienteController::class, 'departamentos']);
Route::post('/Pacientes/{Paciente}/municipios', [PacienteController::class, 'municipios']);


//Rutas select triple.
Route::post('/Empresa/departamentos',          [App\Http\Controllers\Empresa\EmpresaController::class, 'departamentos']);
Route::post('/Empresa/municipios',          [App\Http\Controllers\Empresa\EmpresaController::class, 'municipios']);

//Permisos para la creación y actualización de equipos
//La plantilla es la vista para crear los equipos por un archivo plano
Route::get('/TeamEmpresa/plantilla', [TeamEmpresaController::class,'plantilla'])->name('TeamEmpresa.plantilla');
Route::post('/TeamEmpresa/importar', [TeamEmpresaController::class,'importar'])->name('TeamEmpresa.importar');
Route::resource('/TeamEmpresa',TeamEmpresaController::class);

Route::get('/User/plantilla', [UserController::class,'plantilla'])->name('User.plantilla');
Route::post('/User/importar', [UserController::class,'importar'])->name('User.importar');
Route::get('/User/index', [UserController::class,'index'])->name('User.index');
Route::post('/User/create-equipo', [UserController::class,'store_equipos'])->name('User.store_equipos');
Route::get('/User/create-equipo', [UserController::class,'create_equipos'])->name('User.create_equipos');
Route::resource('/User',UserController::class);

//Rutas para los servicios.
Route::get('/Servicios/index', [ServicioController::class,'index'])->name('Servicios.index');
Route::get('/Servicios/create', [ServicioController::class,'create'])->name('Servicios.create');
Route::post('/Servicios/store', [ServicioController::class,'store'])->name('Servicios.store');
Route::get('/Servicios/{ServicioEmpresa}/edit', [ServicioController::class,'edit'])->name('Servicios.edit');
Route::put('/Servicios/{ServicioEmpresa}', [ServicioController::class,'update'])->name('Servicios.update');

//Rutas para las sucursales
Route::get('/Sucursales/index', [SucursalEmpresaController::class,'index'])->name('Sucursales.index');
Route::get('/Sucursales/create', [SucursalEmpresaController::class,'create'])->name('Sucursales.create');
Route::post('/Sucursales/store', [SucursalEmpresaController::class,'store'])->name('Sucursales.store');
Route::get('/Sucursales/{SucursalEmpresa}/edit', [SucursalEmpresaController::class,'edit'])->name('Sucursales.edit');
Route::put('/Sucursales/{SucursalEmpresa}', [SucursalEmpresaController::class,'update'])->name('Sucursales.update');

//Rutas select triple.
Route::post('/Sucursales/departamentos', [SucursalEmpresaController::class, 'departamentos']);
Route::post('/Sucursales/municipios', [SucursalEmpresaController::class, 'municipios']);
Route::post('/Sucursales/{SucursalEmpresa}/departamentos', [SucursalEmpresaController::class, 'departamentos']);
Route::post('/Sucursales/{SucursalEmpresa}/municipios', [SucursalEmpresaController::class, 'municipios']);

//Guarda los permisos creados para el usuario seleccionado.
Route::put('/Permisos/user/{User}', [ProfileUserController::class,'update_user'])->name('Permisos.update_user');
Route::get('/Permisos/{User}/edit', [ProfileUserController::class,'edit'])->name('Permisos.edit');

//Rutas para dar los permisos a las empresas.
Route::put('/Permisos/team/{TeamEmpresa}', [ProfileUserController::class,'update_team'])->name('Permisos.update_team');
Route::get('/Permisos/{TeamEmpresa}/editEquipos', [ProfileUserController::class,'edit_equipos'])->name('Permisos.edit_equipos');

Route::get('/Permisos/equipos', [ProfileUserController::class,'create_equipos'])->name('Permisos.create_equipos');
Route::get('/Permisos/index', [ProfileUserController::class,'index'])->name('Permisos.index');
Route::resource('/Permisos',ProfileUserController::class);

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    //return view('auth.usuarios');
    return redirect("User/index");
})->middleware(['auth'])->name('dashboard');

Route::controller(EmpresaController::class)->group(function(){
    Route::resource('/Empresa',EmpresaController::class);
});

require __DIR__.'/auth.php';

/*
Route::get('NaturalPersona', [NaturalPersonaController::class,'index']);
Route::get('NaturalPersona/{NaturalPersona}', [NaturalPersonaController::class,'show']);
Route::get('NaturalPersona/create', [NaturalPersonaController::class,'create']);
Route::get('NaturalPersona/{NaturalPersona}/edit', [NaturalPersonaController::class,'edit']);
Route::post('NaturalPersona', [NaturalPersonaController::class,'store']);
Route::put('NaturalPersona/{NaturalPersona}', [NaturalPersonaController::class,'update']);
Route::delete('NaturalPersona/{NaturalPersona}', [NaturalPersonaController::class,'delete']);
*/
//Route::redirect('/NaturalPersona', '/NaturalPersona/index');
/*
Route::get('/NaturalPersona/index', [NaturalPersonaController::class,'index']);
Route::get('/NaturalPersona/crear',  [NaturalPersonaController::class,'nuevo_usuario']);
Route::post('/NaturalPersona/crear', [NaturalPersonaController::class,'verificar_persona'])->name('NaturalPersona.verificar_persona');
Route::resource('/NaturalPersona',NaturalPersonaController::class);
*/
