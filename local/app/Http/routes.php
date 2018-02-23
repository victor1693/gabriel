<?php
Route::get('/', 'con_login@index');
Route::get('iniciar', 'con_login@index');
Route::get('register', 'con_register@index');
Route::get('tokken/{id}', 'con_register@token');
Route::get('error', function (){return view('error.error');});
Route::get('token', function (){return view('error.token');});
Route::get('terminos', function (){return view('terminos');});
Route::post('login', 'con_login@create');
Route::post('registro', 'con_register@create');

//Rutas Gabriel
Route::get('clean', function (){return view('clean');});
//Rutas con privilegios
Route::group(['middleware' =>'login'], function () { 
Route::get('inicio', 'con_home@index'); 
Route::get('logout', 'con_login@salir'); 
});
 