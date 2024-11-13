<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AccountController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\RegistrationController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\ProjectController;

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

Route::prefix('auth')->group(function () {
    Route::post('register', [RegistrationController::class, 'register']);
    Route::post('login', [LoginController::class, 'login'])->middleware('guest');
    Route::post('logout', [LoginController::class, 'logout'])->middleware('auth:sanctum');

    Route::post('verifications', [VerificationController::class, 'verifications']);
    Route::post('verifications/validate', [VerificationController::class, 'validateCode']);

    Route::post('verify-account', [VerificationController::class, 'verifyAccount']);

    Route::post('reset-password', [PasswordController::class, 'resetPassword']);

    Route::post('change-password', [PasswordController::class, 'changePassword'])->middleware('auth:sanctum');

    Route::delete('delete-account', [AccountController::class, 'deleteAccount'])->middleware('auth:sanctum');

    Route::get('user', static fn(Request $request)
        => response()->json(['payload' => $request->user()->load('userable')]))->middleware('auth:sanctum');
});


Route::apiResource('projects', ProjectController::class)->except(['show']);

