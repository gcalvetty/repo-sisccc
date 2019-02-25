<?php
Route::get('/', [
    'as'   => 'Dir.Reg',
    'uses' => 'DirController@index']);

/*
 * Opciones del Menu
 */
Route::get('/listado_docentes', [
    'as'   => 'Dir.Doc',
    'uses' => 'DirController@listDocentes']);

Route::get('/agenda', [
    'as'   => 'Dir.agenda',
    'uses' => 'DirController@verAgenda']);

Route::get('/comportamiento', [
    'as'   => 'Dir.comportamiento',
    'uses' => 'DirController@verComportamiento']);

Route::get('/actividades', [
    'as'   => 'Dir.actividades',
    'uses' => 'DirController@verActividades']);

Route::get('/libretaAux', [
    'as'   => 'Dir.lib',
    'uses' => 'LibretaController@index']);

Route::get('/libreta',[ 
    'as' => 'Dir.libreta',
    'uses' => 'DirController@verlibreta'    
]);
/*
* Alumnos RUDE
*/
// ---- Dar de baja ----
Route::get('/baja/rude-gecn/{alumno}',[
    'as' => 'Dir.bajaAlm',
    'uses' => 'DirController@bajaAlumno',
])->where(['alumno'=>'[0-9]+']);

// ---- Borrar alumno ----
Route::get('/borrar/rude-gecn/{alumno}',[
    'as' => 'Dir.delAlm',
    'uses' => 'DirController@borrEst',
])->where(['alumno'=>'[0-9]+']);

/*
 * Libreta Subir
 */
Route::get('/subir/libreta/{alumno}', 
        array('uses' => 'DirController@editlibreta',
              'as' => 'Dir.sublib'))->where(['alumno'=>'[0-9]+']);

Route::post('/subir/libreta/guardar', 
        array('uses' => 'DirController@storeLibreta',
              'as' => 'Dir.subirPdf'));

/* rutas para subir archivo Libreta.pdf */
Route::resource('libreta-d', 'LibretaController', ['parameters' => [
    'libreta-d' => 'alumno',
]]);

/*
 * Rutas Para update - edit - etc.
 */
Route::resource('rude-d', 'RudeController', ['parameters' => [
    'rude-d' => 'alumno',
]]);

Route::get('rude-d/{alumno}/imprimir', [
    'as' => 'rude-d.imprimir',
    'uses' => 'RudeController@imprimir',
])->where(['alumno' => '[0-9]+']);

/*
 * Rutas Para listar Alumnos por Nivel
 */
Route::get('/nivel/{grd_nivel}', [
    'as'   => 'rude.nivel',
    'uses' => 'DirController@index',
])->where(['grd_nivel' => '[1-4]']);

/*
 * Perfil
 */

Route::get('/perfil', [
    'as'   => 'Dir.perfil',
    'uses' => 'DirController@perfil',
]);
Route::put('/perfil-actualizar', [
    'as'   => 'Dir.perfil.actl',
    'uses' => 'DirController@perfil_Actl',
]);
Route::put('/perfil-actualizar-foto', [
    'as'   => 'Dir.perfil.actl.fot',
    'uses' => 'DirController@perfil_Actl_Fot',
]);

/*
 * Docentes
 */
Route::get('/asigMaterias', [
    'as'   => 'Dir.asig.materias',
    'uses' => 'DirController@asignarMaterias',
]);

/*
 * Comunicado
 */
Route::get('/comunicado', [
    'as'   => 'Dir.com',
    'uses' => 'DirController@verComunicado',
]);

/* ---- accion de comunicado ---- */
Route::get('comunicado/mostrar', [
    'as'   => 'Dir.Com-ver',
    'uses' => 'DirController@mostrarComunicado',
]);

/* ---- Borrar Comunicado ---- */
Route::get('borrar/{comunicado}', [
    'as'   => 'Dir.Act-borrar',
    'uses' => 'DirController@borrarComunicado',
])->where(['comunicado' => '[0-9]+']);

Route::resource('acc_comunicado', 'DirController', [
    'except' => ['show', 'edit'],
]
);

/* ---- accion de Cuaderno de Seguimiento ---- */
Route::get('cuaderno_seguimiento', [
    'as' => 'Dir.cuadSegui',
    'uses' => 'DirController@verCuaderno']);

/* ---------------- */
Route::get('cuaderno/mostrar',[
    'as' => 'Dir.Cua-mostrar',
    'uses' => 'DirController@mostrarSeguimiento'    
]);

Route::post('cuaderno/guardar',[
    'as' => 'Dir.Cua-guardar',
    'uses' => 'DirController@guardarSeguimiento'    
]);

Route::delete('cuaderno/borrar/{tarea}',[
    'as' => 'Dir.Cua-borrar',
    'uses' => 'DirController@borrarSeguimiento'    
])->where(['tarea' => '[0-9]+']);

