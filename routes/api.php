<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Hash;


#llamar al controller
use App\Http\Controllers\challengeController;
use App\Http\Controllers\cursoController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ClassroomController as ClassroomController;

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

# * Rutas protegidas por autenticación
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/auth/logout', [AuthController::class, 'logout']);
    Route::get('/profile', [ProfileController::class, 'watchprofile']);
    Route::put('/updateProfile', [ProfileController::class, 'updateProfile']);
});
##!# Rutas para Classroom
#ruta para ver todos los Classroom
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/classroom', [ClassroomController::class, 'index']);
});
#ruta para ver los Classroom del usuario
#Route::get('/classroom/{id}', [ClassroomController::class, 'show']);
#ruta para crear un Classroom
#Route::post('/classroom', [ClassroomController::class, 'store']);
#ruta para actualizar un Classroom
#Route::put('/classroom/{id}', [ClassroomController::class, 'update']);
#ruta para eliminar un Classroom
#Route::delete('/classroom/{id}', [ClassroomController::class, 'destroy']);
