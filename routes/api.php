<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use  App\Http\Controllers ;

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

//Lista de de empleados
Route::get('/employee',[Controllers\EmployeeController::class,'index']);
//Crear empleados
Route::post('/employee',[Controllers\EmployeeController::class,'store']);
//ver empleados
Route::get('/employee/{id}',[Controllers\EmployeeController::class,'show']);
//Actualizar empleados
Route::put('/employee/{id}',[Controllers\EmployeeController::class,'update']);
//Eliminar empleados
Route::delete('/employee/{id}',[Controllers\EmployeeController::class,'destroy']);
