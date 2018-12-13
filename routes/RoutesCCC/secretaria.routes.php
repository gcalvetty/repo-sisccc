<?php

Route::get('/', [
    'as' => 'Secr.Reg',
    'uses' => 'SecrController@index']);

/*
 * Opciones del Menu
 */
Route::get('/agenda', [
    'as' => 'Secr.agenda',
    'uses' => 'SecrController@verAgenda']);

Route::get('/comportamiento', [
    'as' => 'Secr.comportamiento',
    'uses' => 'SecrController@verComportamiento']);

Route::get('/actividades', [
    'as' => 'Secr.actividades',
    'uses' => 'SecrController@verActividades']);

Route::get('/libreta',[ 
    'as' => 'Secr.libreta',
    'uses' => 'SecrController@verlibreta'    
]);

Route::get('/reportes', [
    'as' => 'Secr.reportes',
    'uses' => 'SecrController@verReportes']);

Route::get('/avatar', [
    'as' => 'Secr.Avatar',
    'uses' => 'SecrController@verAvatar']);

/*
 * Rutas Para listar Alumnos por Nivel
 */
Route::get('libreta/nivel/{grd_nivel}', [
    'as'   => 'rude.nivel',
    'uses' => 'SecrController@index',
])->where(['grd_nivel' => '[1-4]']);
/*
 * Libreta Subir
 */
Route::get('/subir/libreta/{alumno}', 
        array('uses' => 'SecrController@editlibreta',
              'as' => 'Secr.sublib'))->where(['alumno'=>'[0-9]+']);

Route::post('/subir/libreta/guardar', 
        array('uses' => 'SecrController@storeLibreta',
              'as' => 'Secr.subirPdf'));
/*
* Avatar
*/      

Route::get('/subir/avatar/{idUsu}', 
        array('uses' => 'SecrController@editAvatar',
              'as' => 'Secr.subAvatar'))->where(['idUsu'=>'[0-9]+']);

Route::post('/subir/avatar/guardar', 
        array('uses' => 'SecrController@storeAvatar',
               'as' => 'Secr.subirAvatar'));


/*
 * ----
 */

Route::resource('rude-s', 'RudeSecController', ['parameters' => [
        'rude-s'=>'alumno'
]]);

Route::get('rude-s/{alumno}/imprimir',
        array('uses' => 'RudeSecController@imprimir',
              'as' => 'rude-s.imprimir'))->where(['alumno' => '[0-9]+']);

/*
 * Reporte
 */
Route::get('/reporte/lista-{grd_nivel}-alumnos/', 
        array('uses'=> 'SecrController@ReporteNivel',
              'as' => 'rep.secrAlumnos'))->where(['grd_nivel'=>'[0-4]']);

Route::get('/reporte/rude/', 
        array('uses'=> 'SecrController@ReporteRude',
              'as' => 'rep.rude'));

Route::get('/reporte/Tarea-{grd_nivel}-alumnos/', 
        array('uses'=> 'SecrController@ReporteTareaNivel',
              'as' => 'rep.TareaAlum'))->where(['grd_nivel'=>'[0-4]']);

/* ----- */
Route::get('/reporte/regencia/', 
        array('uses'=> 'SecrController@ReporteRegencia',
              'as' => 'rep.Regencia'));

Route::get('/reporte/comunicado/', 
        array('uses'=> 'SecrController@ReporteComunicado',
              'as' => 'rep.Comunicado'));
Route::get('/reporte/psicologico/', 
        array('uses'=> 'SecrController@ReportePsico',
              'as' => 'rep.Psicologico'));



/*
 * Calendario de Actividades
 */

/* ---- accion de calendario actividad ---- */
Route::get('cal_actividad/mostrar',[ 
    'as' => 'Secr.Cal-ver',
    'uses' => 'SecrController@mostrarCalActividad'    
]);

Route::resource('acc_calactividad', 'SecrController', [
    'except' => ['show',  'edit'],
        ]
);


