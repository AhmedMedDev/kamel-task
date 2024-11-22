<?php

use Illuminate\Support\Facades\Route;

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


Route::view('login', 'auth.login');
Route::view('register', 'auth.register');

Route::view('/', 'index');
Route::view('tasks', 'tasks');
Route::view('my-assigned-tasks', 'my-tasks');