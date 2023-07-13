<?php

use App\Http\Controllers\HabitantController;
use App\Http\Controllers\VilleController;
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



Route::middleware(['auth'])->group(
    function () {
        Route::controller(HabitantController::class)->group(function () {
            Route::get('/habitant', 'index');
            Route::get('/habitant/create', 'create');
            Route::get('/habitant/{id}', 'show');
            Route::get('/habitant/{id}/edit', 'edit');

            Route::post('/habitant/create', 'store');
            Route::put('/habitant/{id}', 'update');
            Route::delete('/habitant/{id}', 'destroy');
        });
        Route::resource("/villes", VilleController::class);
    }
);
Auth::routes();


Route::get('/', function () {
    return view('welcome');
});
