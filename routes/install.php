<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/*
 *  All Inatall and Update Function
 *  @Author Sm Shahjalal Shaju.
 *	Email: shajushahjalal@gmail
 *  
 */

Route::get('install','Install\InstallController@ShowInstallPage');
Route::post('install','Install\InstallController@Install');

Route::middleware(['IsInstalled'])->group(function(){
	Route::get('install/update','Install\InstallController@ShowUpdatePage');  
	Route::post('install/update','Install\InstallController@UpdateInstall');  
});
