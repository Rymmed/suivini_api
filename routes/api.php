<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login'])->name('login');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

/* ************ordo **************** */
Route::post('/ordonnances', 'App\Http\Controllers\OrdonnanceController@store');
Route::get('/ordonnances', 'App\Http\Controllers\OrdonnanceController@index');
Route::get('/ordonnances/{id}', 'App\Http\Controllers\OrdonnanceController@show');
Route::delete('/ordonnances/{id}', 'App\Http\Controllers\OrdonnanceController@destroy');
Route::put('/ordonnances/{id}', 'App\Http\Controllers\OrdonnanceController@update');
/* ***************ligneordo***************** */
Route::post('/ligneordonnances', 'App\Http\Controllers\LigneordonnanceController@store');
Route::get('/ligneordonnances', 'App\Http\Controllers\LigneordonnanceController@index');
Route::get('/ligneordonnances/{id}', 'App\Http\Controllers\LigneordonnanceController@show');
Route::delete('/ligneordonnances/{id}', 'App\Http\Controllers\LigneordonnanceController@destroy');
Route::put('/ligneordonnances/{id}', 'App\Http\Controllers\LigneordonnanceController@update');

/* ******************* Rappel ************** */
Route::post('/rappelprisemedicament', 'App\Http\Controllers\RappelprisemedicamentController@store');
Route::get('/rappelprisemedicament', 'App\Http\Controllers\RappelprisemedicamentController@index');
Route::get('/rappelprisemedicament/{id}', 'App\Http\Controllers\RappelprisemedicamentController@show');
Route::delete('/rappelprisemedicament/{id}', 'App\Http\Controllers\RappelprisemedicamentController@destroy');
Route::put('/rappelprisemedicament/{id}', 'App\Http\Controllers\RappelprisemedicamentController@update');
