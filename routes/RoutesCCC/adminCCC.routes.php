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
