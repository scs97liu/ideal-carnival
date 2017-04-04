<?php

Auth::routes();
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get('/', ['as' => 'home', 'uses' => 'HomeController@index'])->middleware(['auth', 'impersonating']);

Route::group(['middleware' => ['auth', 'impersonating']], function(){
    Route::get('impersonate/stop', ['as' => 'impersonate.stop', 'uses' => 'HomeController@stopImpersonate']);
    Route::get('impersonate/{id}', ['as' => 'impersonate', 'uses' => 'HomeController@impersonate']);
    Route::resource('log', LogController::class);
    Route::get('graph/bg', ['as' => 'graph.bg', 'uses' => 'GraphController@bg']);
    Route::get('graph/average', ['as' => 'graph.average', 'uses' => 'GraphController@average']);
    Route::resource('graph', GraphController::class);
    Route::post('communication/prof/delete', ['as' => 'communication.prof.delete', 'uses' => 'CommunicationController@deleteProf']);
    Route::post('communication/prof/add', ['as' => 'communication.prof.add', 'uses' => 'CommunicationController@addProf']);
    Route::get('communication/prof/search', ['as' => 'communication.prof.search', 'uses' => 'CommunicationController@search']);
    Route::post('communication/log/search', ['as' => 'communication.log.search', 'uses' => 'CommunicationController@searchLogs']);
    Route::get('communication/manage', ['as' => 'communication.manage', 'uses' => 'CommunicationController@manage']);
    Route::resource('communication', CommunicationController::class);
    Route::resource('setting', SettingController::class);
    Route::get('tool', ['as' => 'tool.index', 'uses' => 'ToolController@index']);
    Route::get('tool/import', ['as' => 'tool.import', 'uses' => 'ToolController@import']);
});