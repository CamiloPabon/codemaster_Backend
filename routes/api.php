<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

#llamar al controller
use App\Http\Controllers\challengeController;
use App\Http\Controllers\cursoController;
use App\Http\Controllers\AuthController;

 #*lista todos los retos
Route::get('/challenge', [challengeController::class, 'index']);

 #*muestra un reto por id
Route::get('/challenge/{id}', [challengeController::class, 'show']);

 #*crea retos
Route::post('/challenge', [challengeController::class, 'store']);

 #*actualiza un reto
Route::put('/challenge/{id}', [challengeController::class, 'update']);

#*borra un reto
Route::delete('/challenge/{id}', [challengeController::class, 'destroy']);

# listar cursos
Route::get('/cursos', [cursoController::class, 'getCursos']);

# APARTADO DE LOGIN Y REGISTER
Route::post('/auth/register', [AuthController::class, 'register']);
Route::post('/auth/login', [AuthController::class, 'login']);
