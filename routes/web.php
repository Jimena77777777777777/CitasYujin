<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Rutas para especilidades
Route::get('/especialidades', [App\Http\Controllers\SpecialtyController::class, 'index']);//Listado de especialdiades
Route::get('/especialidades/create', [App\Http\Controllers\SpecialtyController::class, 'create']);//Crear especialdiades
Route::get('/especialidades/{specialty}/edit', [App\Http\Controllers\SpecialtyController::class, 'edit']);//Editar especialdiades
Route::post('/especialidades', [App\Http\Controllers\SpecialtyController::class, 'sendData']);//enviar especialdiades

Route::put('/especialidades/{specialty}', [App\Http\Controllers\SpecialtyController::class, 'update']);//actualizar especialdiades
Route::delete('/especialidades/{specialty}', [App\Http\Controllers\SpecialtyController::class, 'destroy']);//actualizar especialdiades

// Rutas medicas

Route::resource('medicos', 'App\Http\Controllers\DoctorController');

// Ruta Pacientes

Route::resource('pacientes', 'App\Http\Controllers\PatientController');