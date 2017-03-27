<?php

Auth::routes();
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get('/', function () {
    $user = Auth::user();
    return view('main.home')->withTitle('Dashboard');
})->name('home')->middleware('auth');

Route::resource('log', LogController::class);
Route::get('graph/bg', ['as' => 'graph.bg', 'uses' => 'GraphController@bg']);
Route::get('graph/average', ['as' => 'graph.average', 'uses' => 'GraphController@average']);
Route::resource('graph', GraphController::class);
Route::resource('communication', CommunicationController::class);
Route::resource('setting', SettingController::class);