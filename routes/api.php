<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\EventController;

Route::post('/events', [EventController::class, 'create']);
Route::get('/events', [EventController::class, 'getAll']);