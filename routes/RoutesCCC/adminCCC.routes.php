<?php

Route::get('/', [
    'as' => 'AdmCCC.Reg',
    'uses' => 'AdmController@index']);

Route::get('/usuarios', [
    'as' => 'AdmCCC.usuReg',
    'uses' => 'AdmController@usuarios']);    

Route::get('/borrar/{users}', [
    'as' => 'AdmCCC.borrReg',
    'uses' => 'AdmController@borrarusuarios']);    
