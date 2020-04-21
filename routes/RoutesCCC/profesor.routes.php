<?php

Route::get('/', [
    'as' => 'Prof.Reg',
    'uses' => 'ProfController@index']);


/*
 * Opciones del Menu
 */
Route::get('/agenda', [
    'as' => 'Prof.agenda',
    'uses' => 'ProfController@verAgenda']);

Route::get('/comportamiento', [
    'as' => 'Prof.comportamiento',
    'uses' => 'ProfController@verComportamiento']);

Route::get('/actividades', [
    'as' => 'Prof.actividades',
    'uses' => 'ProfController@verActividades']);

Route::get('/cuaderno_seguimiento', [
    'as' => 'Prof.cuadSegui',
    'uses' => 'ProfController@verCuaderno']);

/* ----------------------------------- */
/* ---- accion de actividad tarea ---- */
/* ----------------------------------- */
Route::get('actividad/mostrar',[
    'as' => 'Prof.Act-guardar',
    'uses' => 'ProfController@mostrarActividades'    
]);

Route::post('actividad/guardar',[
    'as' => 'Prof.Act-guardarGECN',
    'uses' => 'ProfController@insActividad'    
]);

Route::get('actividad/borrar/{tarea}',[
    'as' => 'Prof.Act-borrarGECN',
    'uses' => 'ProfController@borrarActividad'    
])->where(['tarea' => '[0-9]+']);



Route::get('borrar/{tarea}',[
    'as' => 'Prof.Act-borrar',
    'uses' => 'ProfController@borrarActividades'    
])->where(['tarea' => '[0-9]+']);

/* ----------------------------------- */
/* ---- Comportamiento del Alumno ---- */
/* ----------------------------------- */
Route::get('/comportamiento',[
    'as' => 'Prof.Comp',
    'uses' => 'ProfController@comportamiento',    
]);

Route::get('/insComportamiento',[
    'as' => 'Prof.insCom',
    'uses' => 'ProfController@insComportamiento',    
]);
Route::get('/delComportamiento',[
    'as' => 'Prof.delCom',
    'uses' => 'ProfController@delComportamiento',    
]);

Route::get('/PDFComportamiento/alum-{AlmId}-ccc',[
    'as' => 'Prof.PDFCom',
    'uses' => 'ProfController@PDFComportamiento',    
])->where(['AlmId'=>'[0-9]+']);


/* ----------------------------------- */
/* ---- accion de Cuaderno de Seguimiento ---- */
/* ----------------------------------- */
Route::get('cuaderno/mostrar',[
    'as' => 'Prof.Cua-mostrar',
    'uses' => 'ProfController@mostrarSeguimiento'    
]);

Route::post('cuaderno/guardar',[
    'as' => 'Prof.Cua-guardar',
    'uses' => 'ProfController@guardarSeguimiento'    
]);

Route::delete('cuaderno/borrar/{tarea}',[
    'as' => 'Prof.Cua-borrar',
    'uses' => 'ProfController@borrarSeguimiento'    
])->where(['tarea' => '[0-9]+']);

/* ---- ---- */
route::resource('actividad','ProfController',
                [
                    'except'=>['show','create','edit'],
                    //'parameters' => [ 'Prof'=>'id','Curso'=>'valor']
                ]
                );

route::resource('cuaderno','ProfController',
                [
                    'except'=>['show','create','edit'],
                    //'parameters' => [ 'Prof'=>'id','Curso'=>'valor']
                ]
                );

/*
* ---- CUADERNO DE SEGUIMIENTO ----
*/                
