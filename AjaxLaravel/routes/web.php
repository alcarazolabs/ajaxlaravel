<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('persona','PersonaController');

Route::get('/persona/{id}/confirm','PersonaController@confirm')->name('persona.confirm');

Route::get('/cancelar_persona', function(){
    return redirect()->route('persona.index')->with('cancelar','Acción Cancelada');
})->name('cancelar_persona');