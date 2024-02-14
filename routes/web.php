<?php

use App\Http\Controllers\IncidenciasController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::controller(IncidenciasController::class)->group(function(){
    Route::get('/', 'index')                        ->name('incidencias.index');
    Route::get('incidencias/create','create')          ->name('incidencias.create');
    Route::get('incidencias/{id}','show')              ->name('incidencias.show');
    Route::post('incidencias/create/store','store')    ->name('incidencias.store');
    Route::get('incidencias/edit/{id}','edit')         ->name('incidencias.edit');
    Route::put('incidencias/{id}','update')            ->name('incidencias.update');
    Route::put('incidencias/delete/{id}','destroy')        ->name('incidencias.destroy');
});