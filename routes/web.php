<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\UasController;


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
    return view('welcome');
});

// CRUD uas
Route::get('/uas', [uasController::class,'index']);
Route::get('/uas/create', [uasController::class,'create']);
Route::post('/uas', [uasController::class,'store']);
Route::get('/uas/{uas_id}/edit', [uasController::class,'edit']);
Route::put('/uas/{uas_id}', [uasController::class,'update']);
Route::delete('/uas/{uas_id}', [uasController::class,'destroy']);
