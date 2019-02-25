<?php

Route::get('/', [
    'as'   => 'Admtr.Reg',
    'uses' => 'AdmtrController@index']);

/*
 * Opciones del Menu
 */
Route::get('/profesores/nivel/{grd_nivel}', [
    'as'   => 'Admtr.profesor',
    'uses' => 'AdmtrController@verProfesor',
])->where(['grd_nivel' => '[1-4]']);

Route::get('/listado_docentes', [
    'as'   => 'Admtr.Doc',
    'uses' => 'AdmtrController@listDocentes']);
/* ---------- */

Route::get('/alumnos/nivel/{grd_nivel}', [
    'as'   => 'Admtr.alumnos',
    'uses' => 'AdmtrController@verAlumnos',
])->where(['grd_nivel' => '[1-4]']);

Route::get('/alumnos', [
    'as'   => 'Admtr.listalumnos',
    'uses' => 'AdmtrController@listAlumnos',
]);

/* ---------- */
Route::get('/alumcomportamiento', [
    'as'   => 'Admtr.alumcomportamiento',
    'uses' => 'AdmtrController@regecomportamiento',
]);

Route::get('/PDFComportamiento/alum-{AlmId}-ccc',[
    'as' => 'Admtr.PDFCom',
    'uses' => 'AdmtrController@PDFComportamiento',    
])->where(['AlmId'=>'[0-9]+']);

/* ----------- */
Route::get('/actividades-ccc', [
    'as'   => 'Admtr.secactividades',
    'uses' => 'AdmtrController@secActividades',
]);


Route::get('cal_actividad/mostrar',[ 
    'as' => 'Admtr.Cal-ver',
    'uses' => 'AdmtrController@mostrarCalActividad'    
]);

/* ----------- */
Route::get('/psicocomportamiento',[
    'as' => 'Admtr.PsiComp',
    'uses' => 'AdmtrController@Psicomportamiento',    
]);

/* ----------- */


Route::get('/agenda', [
    'as'   => 'Admtr.agenda',
    'uses' => 'AdmtrController@verAgenda']);

Route::get('/comportamiento', [
    'as'   => 'Admtr.comportamiento',
    'uses' => 'AdmtrController@verComportamiento']);

Route::get('/actividades', [
    'as'   => 'Admtr.actividades',
    'uses' => 'AdmtrController@verActividades']);

/*
 * Rutas Para update - edit - etc.
 */

Route::get('rude-adm/{alumno}/imprimir',
    ['as'  => 'rude-adm.imprimir',
        'uses' => 'AdmtrController@AlumnoImprimir',
    ])->where(['alumno' => '[0-9]+']);

    
/* ---- accion de Cuaderno de Seguimiento ---- */
Route::get('cuaderno_seguimiento', [
    'as' => 'Admtr.cuadSegui',
    'uses' => 'AdmtrController@verCuaderno']);

/* ---------------- */
Route::get('cuaderno/mostrar',[
    'as' => 'Admtr.Cua-mostrar',
    'uses' => 'AdmtrController@mostrarSeguimiento'    
]);

Route::post('cuaderno/guardar',[
    'as' => 'Admtr.Cua-guardar',
    'uses' => 'AdmtrController@guardarSeguimiento'    
]);

Route::delete('cuaderno/borrar/{tarea}',[
    'as' => 'Admtr.Cua-borrar',
    'uses' => 'AdmtrController@borrarSeguimiento'    
])->where(['tarea' => '[0-9]+']);


