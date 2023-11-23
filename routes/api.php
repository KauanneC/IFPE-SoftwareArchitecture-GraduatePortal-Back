<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\EventController;

Route::post('/events', [EventController::class, 'create']);
Route::get('/events', [EventController::class, 'getAll']);
Route::delete('/events/{id}', [EventController::class, 'remove']);
Route::put('/events/{id}', [EventController::class, 'update']);

Route::post('/forms', [FormController::class, 'create']);
Route::get('/forms/{formType}', [FormController::class, 'getAllFormType']);
Route::delete('/forms/{id}', [FormController::class, 'remove']);

Route::post('/user', [UserController::class, 'create']);
Route::get('/user/{email}', [UserController::class, 'getByEmail']);
Route::delete('/user/{id}', [UserController::class, 'remove']);
Route::get('/user/{profile}/{page}', [UserController::class, 'getAllByProfile']);