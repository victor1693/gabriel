<?php
Route::post('test', 'con_register@test');
Route::get('/', 'con_login@index');
Route::get('iniciar', 'con_login@index');
Route::get('register', 'con_register@index');
Route::get('tokken/{id}', 'con_register@token');
Route::get('error', function (){return view('error.error');});
Route::get('token', function (){return view('error.token');});
Route::get('terminos', function (){return view('terminos');});
Route::post('login', 'con_login@create');
Route::post('registro', 'con_register@create'); 
Route::post('recuperarc', 'con_login@recuperar'); 


Route::get('json', 'HomeController@index');


//Rutas Gabriel
Route::get('clean', function (){return view('clean');});

//Rutas con privilegios
Route::group(['middleware' =>'login'], function () { 
Route::get('myopins', 'con_home@index_myopins'); 
Route::get('favorites', 'con_home@index_favorites'); 
Route::get('inicio', 'con_home@index'); 
Route::get('logout', 'con_login@salir');
Route::post('listaropins', 'con_home@ajax_listar_opins');
Route::post('validaropin', 'con_home@validar_votados');
Route::post('validarvotado', 'con_home@ver_votados');

Route::get('opins/{id}', 'con_opins@index');
Route::get('votado', 'con_opins@votado');
Route::get('profile', function (){return view('profile');});
});
 