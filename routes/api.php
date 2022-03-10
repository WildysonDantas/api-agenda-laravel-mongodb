<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContatoController;
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

/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::get('/agenda', function () {
    return "Api Agenda 1.0 by [Wildyson Dantas dos Santos]";
});

Route::post('agenda/contato/create', [ContatoController::class, 'create']);
Route::put('agenda/contato/update', [ContatoController::class, 'update']);
Route::delete('agenda/contato/delete', [ContatoController::class, 'delete']);
Route::get('agenda/contato/list', [ContatoController::class, 'list'])->name('list');