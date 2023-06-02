<?php

use App\Http\Controllers\AgendaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/agenda', [AgendaController::class, 'index']);
Route::get('/agenda/visualizar/{id}', [AgendaController::class, 'show']);
Route::get('/agenda/visualizarAgenda/{id}', [AgendaController::class, 'showByPerson']);
Route::post('/agenda/criarAgenda', [AgendaController::class, 'create']);
Route::post('/agenda/editarRegistro', [AgendaController::class, 'edit']);
Route::post('/agenda/removerRegistro', [AgendaController::class, 'destroy']);
Route::post('agenda/visualizarIntervalo', [AgendaController::class, 'visualizarIntervalo']);
