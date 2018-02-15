<?php
Route::get('/', 'con_login@index');
Route::get('error', function (){return view('error');});
Route::get('iniciar', 'con_login@index');
Route::post('login', 'con_login@create');
Route::post('registrar', 'con_register@create');
Route::get('register', 'con_register@index');


Route::group(['middleware' =>'login'], function () { 
Route::get('inicio', 'con_home@index'); 
Route::get('logout', 'con_login@salir'); 
});
 