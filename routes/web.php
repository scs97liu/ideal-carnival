<?php

Route::get('/', function () {
    return view('home')->withTitle('Dashboard');
})->name('home');

Route::resource('log', LogController::class);
Route::resource('graph', GraphController::class);
Route::resource('communication', CommunicationController::class);
Route::resource('setting', SettingController::class);