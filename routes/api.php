<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\EventController;

Route::post('/events', [EventController::class, 'create']);
Route::get('/events', [EventController::class, 'getAll']);
Route::delete('/events/{id}', [EventController::class, 'remove']);
Route::put('/events/{id}', [EventController::class, 'update']);