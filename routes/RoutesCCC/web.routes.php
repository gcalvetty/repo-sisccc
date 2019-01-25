<?php

Route::get('/', [
    'as' => 'homeCCC',
    'uses' => 'ErrorController@index']);

// Actividades
Route::get('actividad-ccc',[ 'as' =>'Home.Act', 'uses'=>'HomeController@actividades']);

// Comunicados
Route::get('comunicado-ccc',[ 'as' =>'Home.Comu', 'uses'=>'HomeController@comunicado']);

// Examenes
Route::get('examen-estudiante-ccc',[ 'as' =>'Home.Exm', 'uses'=>'HomeController@examen']);

//Almuerzo
Route::get('menu-ccc',[ 'as' =>'Home.Menu', 'uses'=>'HomeController@Menu']);


/*
 * Acceso
 */

Route::get('acceder-ccc',[
        'as' => 'acceder',
        'uses' => 'Auth\LoginController@showLoginForm'
]);
Route::post('acceder-ccc',[
        'as' => 'acceder',
        'uses' => 'Auth\LoginController@login'
]);
Route::get('logout',[
        'as' => 'cerrar-acceso',
        'uses' => 'Auth\LoginController@logout'
]);

Route::post('logout',[
        'as' => 'cerrar-acceso',
        'uses' => 'Auth\LoginController@logout'
]);

// ----- usar este otro ----
// Auth::routes();

// Login Routes...
Route::get('login', ['as' => 'login', 'uses' => 'Auth\LoginController@showLoginForm']);
Route::post('login', ['as' => 'login.post', 'uses' => 'Auth\LoginController@login']);
Route::post('logout', ['as' => 'logout', 'uses' => 'Auth\LoginController@logout']);


Route::get('superadm/registrar-nuevo-usuario-ccc', 'Auth\RegisterController@showRegistrationForm')->name('register')->middleware('auth');
Route::post('register', 'Auth\RegisterController@register')->middleware('auth');

// Password Reset Routes...
Route::get('direccion/password/reset-gecn/{usuemail}', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request')->where(['usuemail'=>'[A-z0-9\\._-]+@ccc.edu.bo']);
Route::post('direccion/password/email-gecn', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('direccion/password/reset-gecn/{token}/gecn', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('direccion/password/reset-gecn', 'Auth\ResetPasswordController@reset')->name('password.update');

// Email Verification Routes...
Route::get('email/verify-gecn', 'Auth\VerificationController@show')->name('verification.notice');
Route::get('email/verify-gecn/{id}', 'Auth\VerificationController@verify')->name('verification.verify');
Route::get('email/resend-gecn', 'Auth\VerificationController@resend')->name('verification.resend');









 
 
 
