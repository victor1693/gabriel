<?php
Route::get('/', 'con_login@index');
Route::get('iniciar', 'con_login@index');
Route::get('register', 'con_register@index');
Route::get('tokken/{id}', 'con_register@token');
Route::get('error', function (){return view('error.error');});
Route::post('login', 'con_login@create');
Route::post('registro', 'con_register@create');

Route::group(['middleware' =>'login'], function () { 
Route::get('inicio', 'con_home@index'); 
Route::get('logout', 'con_login@salir'); 
});
 