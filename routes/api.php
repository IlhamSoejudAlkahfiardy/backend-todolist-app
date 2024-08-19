<?php

use App\Http\Controllers\ToDoController;
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

Route::post('/create',[ToDoController::class, 'store']);
Route::post('/checkUser',[ToDoController::class, 'checkUser']);

Route::get('/getMyTodos',[ToDoController::class, 'getToDos']);
Route::delete('/deleteTodo',[ToDoController::class, 'deleteTodo']);