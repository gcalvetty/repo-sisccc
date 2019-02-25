<?php
Route::get('/', [
    'as' => 'Psico.Reg',
    'uses' => 'PsicoController@index']);

Route::get('/comportamiento',[
    'as' => 'Psico.Comp',
    'uses' => 'PsicoController@comportamiento',    
]);

/*
 * CRUD
 */
Route::post('/insComportamiento',[
    'as' => 'Psico.insCom',
    'uses' => 'PsicoController@insComportamiento',    
]);
Route::get('/delComportamiento',[
    'as' => 'Psico.delCom',
    'uses' => 'PsicoController@delComportamiento',    
]);

/* ---- accion de Cuaderno de Seguimiento ---- */
Route::get('cuaderno_seguimiento', [
    'as' => 'Psico.cuadSegui',
    'uses' => 'PsicoController@verCuaderno']);

/* ---------------- */
Route::get('cuaderno/mostrar',[
    'as' => 'Psico.Cua-mostrar',
    'uses' => 'PsicoController@mostrarSeguimiento'    
]);

Route::post('cuaderno/guardar',[
    'as' => 'Psico.Cua-guardar',
    'uses' => 'PsicoController@guardarSeguimiento'    
]);

Route::delete('cuaderno/borrar/{tarea}',[
    'as' => 'Psico.Cua-borrar',
    'uses' => 'PsicoController@borrarSeguimiento'    
])->where(['tarea' => '[0-9]+']);