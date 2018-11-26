<?php

use Illuminate\Support\Facades\Auth;

Route::get('/', [
    'as' => 'Dir.Reg',
    'uses' => 'DirController@index']);

/*
 * Opciones del Menu
 */
Route::get('/listado_docentes', [
    'as' => 'Dir.Doc',
    'uses' => 'DirController@listDocentes']);

Route::get('/agenda', [
    'as' => 'Dir.agenda',
    'uses' => 'DirController@verAgenda']);

Route::get('/comportamiento', [
    'as' => 'Dir.comportamiento',
    'uses' => 'DirController@verComportamiento']);

Route::get('/actividades', [
    'as' => 'Dir.actividades',
    'uses' => 'DirController@verActividades']);

Route::get('/libreta', [
    'as' => 'Dir.lib',
    'uses' => 'LibretaController@index']);


/* rutas para subir archivo Libreta.pdf */
Route::resource('libreta-d', 'LibretaController', ['parameters' => [
        'libreta-d' => 'alumno'
]]);

/*
 * Rutas Para update - edit - etc.
 */
Route::resource('rude-d', 'RudeController', ['parameters' => [
        'rude-d' => 'alumno'
]]);

Route::get('rude-d/{alumno}/imprimir', ['as' => 'rude-d.imprimir',
    'uses' => 'RudeController@imprimir',
])->where(['alumno' => '[0-9]+']);

/*
 * Rutas Para listar Alumnos por Nivel
 */
Route::get('/nivel/{grd_nivel}', [
    'as' => 'rude.nivel',
    'uses' => 'DirController@index'
])->where(['grd_nivel' => '[1-4]']);

/*
 * Perfil
 */

Route::get('/perfil', [
    'as' => 'Dir.perfil',
    'uses' => 'DirController@perfil',
]);
Route::put('/perfil-actualizar', [
    'as' => 'Dir.perfil.actl',
    'uses' => 'DirController@perfil_Actl',
]);
Route::put('/perfil-actualizar-foto', [
    'as' => 'Dir.perfil.actl.fot',
    'uses' => 'DirController@perfil_Actl_Fot',
]);

/*
 * Docentes
 */
Route::get('/asigMaterias', [
    'as' => 'Dir.asig.materias',
    'uses' => 'DirController@asignarMaterias',
]);

/*
 * Comunicado
 */
Route::get('/comunicado', [
    'as' => 'Dir.com',
    'uses' => 'DirController@verComunicado',
]);

/* ---- accion de comunicado ---- */
Route::get('comunicado/mostrar',[
    'as' => 'Dir.Com-ver',
    'uses' => 'DirController@mostrarComunicado'    
]);

Route::get('borrar/{comunicado}',[
    'as' => 'Dir.Act-borrar',
    'uses' => 'DirController@borrarComunicado'    
])->where(['comunicado' => '[0-9]+']);


Route::resource('acc_comunicado', 'DirController', [
    'except' => ['show',  'edit'],
        ]
);

// *********************************

// Login Routes...
    Route::get('login', ['as' => 'login', 'uses' => 'Auth\LoginController@showLoginForm']);
    Route::post('login', ['as' => 'login.post', 'uses' => 'sis_ccc\Http\Controllers\Auth\LoginController@login']);
    Route::post('logout', ['as' => 'logout', 'uses' => '..\Auth\LoginController@logout']);

// Registration Routes...
    Route::get('register', ['as' => 'register', 'uses' => '..\Auth\RegisterController@showRegistrationForm']);
    Route::post('register', ['as' => 'register.post', 'uses' => '..\Auth\RegisterController@register']);

// Password Reset Routes...
    Route::get('password/reset', ['as' => 'password.reset', 'uses' => '..\Auth\ForgotPasswordController@showLinkRequestForm']);
    Route::post('password/email', ['as' => 'password.email', 'uses' => '..\Auth\ForgotPasswordController@sendResetLinkEmail']);
    Route::get('password/reset/{token}', ['as' => 'password.reset.token', 'uses' => '..\Auth\ResetPasswordController@showResetForm']);
    Route::post('password/reset', ['as' => 'password.reset.post', 'uses' => '..\Auth\ResetPasswordController@reset']);



