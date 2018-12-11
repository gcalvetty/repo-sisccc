<?php

Route::get('/', [
    'as' => 'homeCCC',
    'uses' => 'ErrorController@index']);

// Actividades
Route::get('actividad-ccc',[ 'as' =>'Home.Act', 'uses'=>'HomeController@actividades']);

// Comunicados
Route::get('comunicado-ccc',[ 'as' =>'Home.Comu', 'uses'=>'HomeController@comunicado']);

// Examenes
Route::get('examen-estudiante-ccc',[ 'as' =>'Home.Exm', 'uses'=>'HomeController@examen']);

//Almuerzo
Route::get('menu-ccc',[ 'as' =>'Home.Menu', 'uses'=>'HomeController@Menu']);


/*
 * Acceso
 */

Route::get('acceder-ccc',[
        'as' => 'acceder',
        'uses' => 'Auth\LoginController@showLoginForm'
]);
Route::post('acceder-ccc',[
        'as' => 'acceder',
        'uses' => 'Auth\LoginController@login'
]);
Route::get('logout',[
        'as' => 'cerrar-acceso',
        'uses' => 'Auth\LoginController@logout'
]);

Route::post('logout',[
        'as' => 'cerrar-acceso',
        'uses' => 'Auth\LoginController@logout'
]);

Auth::routes();









 
 
 
