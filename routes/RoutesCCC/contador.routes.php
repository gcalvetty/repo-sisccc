<?php

Route::get('/', [
    'as' => 'Cont.Reg',
    'uses' => 'ContController@index']);

Route::get('alumnos-nivel-{grd_nivel}',[
    'as' => 'Cont.nivel',
    'uses' => 'ContController@index'    
])->where(['grd_nivel'=>'[1-4]']);

Route::get('bloquear/alumno/{id}/blodes/{accion}',[
    'as' => 'bloquear.alumno',
    'uses' => 'Cont_Bloq_Alm_Controller@updateGECN'    
])->where(['accion'=>'[1-2]']);

route::resource('bloquear','Cont_Bloq_Alm_Controller',
                [
                    'except'=>['show','create','edit'],
                    'parameters' => [ 'alumno'=>'id','blodes'=>'valor']
                ]
                );
                   

/* ---- accion de Cuaderno de Seguimiento ---- */
Route::get('cuaderno_seguimiento', [
    'as' => 'Cont.cuadSegui',
    'uses' => 'ContController@verCuaderno']);

/* ---------------- */
Route::get('cuaderno/mostrar',[
    'as' => 'Cont.Cua-mostrar',
    'uses' => 'ContController@mostrarSeguimiento'    
]);

Route::post('cuaderno/guardar',[
    'as' => 'Cont.Cua-guardar',
    'uses' => 'ContController@guardarSeguimiento'    
]);

Route::delete('cuaderno/borrar/{tarea}',[
    'as' => 'Cont.Cua-borrar',
    'uses' => 'ContController@borrarSeguimiento'    
])->where(['tarea' => '[0-9]+']);

