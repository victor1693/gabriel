<?php
Route::get('/', 'con_login@index');

Route::post('login', 'con_login@create');
 
Route::group(['middleware' =>'login'], function () {
Route::get('inicio', 'con_home@index'); 
Route::get('logout', 'con_login@salir');
});
 