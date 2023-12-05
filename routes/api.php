<?php

use App\Http\Middleware\Upload;
use Illuminate\Support\Facades\Route;

use App\Http\Middleware\VerifyUserType;
use App\Http\Middleware\VerifyToken;

use App\Http\Controllers\ResponseController;
use App\Http\Controllers\NoticeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\EventController;

Route::post('/events', [EventController::class, 'create'])->middleware([VerifyToken::class, VerifyUserType::class . ':coordinator,teacher']);
Route::get('/events', [EventController::class, 'getAll']);
Route::delete('/events/{id}', [EventController::class, 'remove'])->middleware([VerifyToken::class, VerifyUserType::class . ':coordinator,teacher']);
Route::put('/events/{id}', [EventController::class, 'update'])->middleware([VerifyToken::class, VerifyUserType::class . ':coordinator,teacher']);

Route::post('/forms', [FormController::class, 'create'])->middleware([VerifyToken::class, VerifyUserType::class . ':coordinator']);
Route::get('/forms/{formType}', [FormController::class, 'getAllFormType']);
Route::delete('/forms/{id}', [FormController::class, 'remove'])->middleware([VerifyToken::class, VerifyUserType::class . ':coordinator']);

Route::post('/user', [UserController::class, 'create'])->middleware([VerifyToken::class, VerifyUserType::class . ':coordinator']);
Route::get('/user/{email}', [UserController::class, 'getByEmail'])->middleware([VerifyToken::class, VerifyUserType::class . ':coordinator']);
Route::delete('/user/{id}', [UserController::class, 'remove'])->middleware([VerifyToken::class, VerifyUserType::class . ':coordinator']);
Route::get('/user/{profile}/{page}', [UserController::class, 'getAllByProfile'])->middleware([VerifyToken::class, VerifyUserType::class . ':coordinator']);
Route::put('/user', [UserController::class, 'updateCode'])->middleware([VerifyToken::class]);

Route::post('/auth', [AuthController::class, 'login']);
Route::post('/auth/primaryacess', [AuthController::class, 'primaryAcess']);
Route::post('/auth/updatepassword', [AuthController::class, 'updatePassword']);

Route::post('/notice', [NoticeController::class, 'create'])->middleware([Upload::class]);
Route::get('/notice', [NoticeController::class, 'getAll']);
Route::delete('/notice/{id}', [NoticeController::class, 'remove'])->middleware([VerifyToken::class, VerifyUserType::class . ':coordinator,teacher']);

Route::post('/response', [ResponseController::class, 'create'])->middleware([VerifyToken::class, VerifyUserType::class . ':,,egress']);
Route::get('/response/{userId}/{formType}', [ResponseController::class, 'getAllFormType'])->middleware([VerifyToken::class, VerifyUserType::class . ':coordinator']);
Route::get('/response/export/pdf/{userId}', [ResponseController::class, 'getPdf']);