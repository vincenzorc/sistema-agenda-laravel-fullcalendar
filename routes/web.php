<?php

use App\Http\Controllers\EventController;
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

Route::get('/', function () {
    return view('event.index');
})->middleware('auth');

Auth::routes();

Route::group(['middleware' => ['auth']], function() {
    Route::get('/event', [EventController::class, 'index']);
    Route::post('/event/agregar', [EventController::class, 'store']);
    Route::post('/event/mostrar', [EventController::class, 'show']);
    Route::post('/event/editar/{id}', [EventController::class, 'edit']);
    Route::post('/event/actualizar/{event}', [EventController::class, 'update']);
    Route::post('/event/borrar/{id}', [EventController::class, 'destroy']);
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
