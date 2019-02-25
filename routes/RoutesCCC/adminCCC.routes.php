<?php

Route::get('/', [
    'as' => 'AdmCCC.Reg',
    'uses' => 'AdmController@index']);

/*
* Usuarios
*/
// ---- Borrar Usuario ----

Route::get('/usuarios', [
    'as' => 'AdmCCC.usuReg',
    'uses' => 'AdmController@usuarios']);    

Route::get('/baja/{users}', [
    'as' => 'AdmCCC.bajaReg',
    'uses' => 'AdmController@bajausuario']);    


/* ---- accion de Cuaderno de Seguimiento ---- */
Route::get('cuaderno_seguimiento', [
    'as' => 'AdmCCC.cuadSegui',
    'uses' => 'AdmController@verCuaderno']);

/* ---------------- */
Route::get('cuaderno/mostrar',[
    'as' => 'AdmCCC.Cua-mostrar',
    'uses' => 'AdmController@mostrarSeguimiento'    
]);

Route::post('cuaderno/guardar',[
    'as' => 'AdmCCC.Cua-guardar',
    'uses' => 'AdmController@guardarSeguimiento'    
]);

Route::delete('cuaderno/borrar/{tarea}',[
    'as' => 'AdmCCC.Cua-borrar',
    'uses' => 'AdmController@borrarSeguimiento'    
])->where(['tarea' => '[0-9]+']);

