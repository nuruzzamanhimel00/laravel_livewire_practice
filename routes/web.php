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

Route::get('/', function () {
    return view('welcome');
});

// todo list CURD
Route::get('/todo', function () {
    return view('todo');
});

// user crete
Route::get('/user-register', function () {
    return view('user-register');
});
// user create and llist
Route::get('/user-register-list', function () {
    return view('user-register-list');
});

Route::get('/user-list', function () {
    return view('user-list');
});
