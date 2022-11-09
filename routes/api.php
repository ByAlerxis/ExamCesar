<?php

use App\Http\Controllers\loginController;
use App\Http\Controllers\UsuarioController;
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
/*
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/usuarios', [UsuarioController::class, 'obtener']);


Route::group(['middleware' => ["auth:sanctum"]], function(){
    Route::get('/usuarios', [UsuarioController::class, 'obtener']);
});*/
Route::get('/usuarios', [UsuarioController::class, 'obtener']);
Route::post('/login', [loginController::class, 'login']);
Route::post('/register', [UsuarioController::class, 'crear']);
Route::get('/userId/{id}', [UsuarioController::class, 'getUserById']);
Route::put('/userId', [UsuarioController::class, 'password']);