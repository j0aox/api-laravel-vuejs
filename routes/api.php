<?php

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

use App\Http\Controllers\ContatoController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get("/get_all_contato", [ContatoController::class, 'get_all_contato']);
Route::post("/add_contato", [ContatoController::class, 'add_contato']);
Route::get("/get_edit_contato/{id}", [ContatoController::class, 'get_edit_contato']);
Route::post("/update_contato/{id}", [ContatoController::class, 'update_contato']);
Route::get("/delete_contato/{id}", [ContatoController::class, 'delete_contato']);