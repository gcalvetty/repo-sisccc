<?php

use Illuminate\Auth\Middleware\Authorize;
use sis_ccc\ModeloCCC\RUDE;
use sis_ccc\ModeloCCC\Nota;

/* ---------------------------------   
   ---- Ver Perfil de Estudiante ---
   --------------------------------- */     

Route::get('/VerPerfil-{Alumno}', [
    'as' => 'est.verPerfil',
    'uses' => 'EstuController@indexPerfil'])->middleware(Authorize::class . ':EscritorioView,'.RUDE::class)->where(['Alumno'=>'[0-9]+']);

/* ----------------------- */    

Route::get('/', [
    'as' => 'est.Escritorio',
    'uses' => 'EstuController@index'])->middleware(Authorize::class . ':EscritorioView,'.RUDE::class);

Route::get('/Informacion', [
    'as' => 'Rude',
    'uses' => 'EstuController@Rude_index'])->middleware(Authorize::class . ':RUDEView,' . RUDE::class);
Route::get('/Notas', [
    'as' => 'Notas',
    'uses' => 'EstuController@Notas_index'])->middleware(Authorize::class . ':NotasView,'.Nota::class);

Route::get('/tareas', [
    'as' => 'est.Tareas',
    'uses' => 'EstuController@Tareas_index']);



Route::get('/libreta', [
    'as' => 'libreta',
    'uses' => 'EstuController@verLibreta']);

Route::get('/agenda', [
    'as' => 'est.agenda',
    'uses' => 'EstuController@verAgenda']);

Route::get('/actividades', [
    'as' => 'est.actividades',
    'uses' => 'EstuController@verActividades']);

Route::get('/comportamiento', [
    'as' => 'est.Compor',
    'uses' => 'EstuController@verComportamiento']);


/*
 * Editar RUDE Estudiante
 */


Route::resource('rude', 'EstuController', ['parameters' => ['rude' => 'idrude']]);
