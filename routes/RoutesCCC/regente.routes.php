<?php

Route::get('/', [
    'as' => 'Rege.Reg',
    'uses' => 'RegeController@index']);

Route::get('/comportamiento',[
    'as' => 'Rege.Comp',
    'uses' => 'RegeController@comportamiento',    
]);

Route::get('/comportamiento/lista-{grd_nivel}-alumnos/', 
        array('uses'=> 'RegeController@comportamiento',
              'as' => 'Rege.Comp.Nivel'))->where(['grd_nivel'=>'[0-4]']);

/*
 * CRUD
 */
Route::get('/insComportamiento',[
    'as' => 'Rege.insCom',
    'uses' => 'RegeController@insComportamiento',    
]);
Route::get('/delComportamiento',[
    'as' => 'Rege.delCom',
    'uses' => 'RegeController@delComportamiento',    
]);

Route::get('/PDFComportamiento/alum-{AlmId}-ccc',[
    'as' => 'Rege.PDFCom',
    'uses' => 'RegeController@PDFComportamiento',    
])->where(['AlmId'=>'[0-9]+']);

/* ---- accion de Cuaderno de Seguimiento ---- */
Route::get('cuaderno_seguimiento', [
    'as' => 'Rege.cuadSegui',
    'uses' => 'RegeController@verCuaderno']);

/* ---------------- */
Route::get('cuaderno/mostrar',[
    'as' => 'Rege.Cua-mostrar',
    'uses' => 'RegeController@mostrarSeguimiento'    
]);

Route::post('cuaderno/guardar',[
    'as' => 'Rege.Cua-guardar',
    'uses' => 'RegeController@guardarSeguimiento'    
]);

Route::delete('cuaderno/borrar/{tarea}',[
    'as' => 'Rege.Cua-borrar',
    'uses' => 'RegeController@borrarSeguimiento'    
])->where(['tarea' => '[0-9]+']);

