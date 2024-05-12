<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login-user', [AuthController::class, 'loginuser'])->name('login-user');
Route::get('/home', [AuthController::class, 'home'])->name('home');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/registration', [AuthController::class, 'registration']);
Route::post('/register-user', [AuthController::class, 'registeruser'])->name('register-user');


#-----------------------------Routes of CRUD operations --------------------------------------------

Route::get('/records', [AuthController::class, 'records'])->name('records');
Route::get('delete/{id}', [AuthController::class, 'delete'])->name('delete');
Route::get('update/{id}', [AuthController::class, 'update'])->name('update');
Route::post('update_data/{id}', [AuthController::class, 'update_data'])->name('update_data');


// -------------------------Change Password------------------------------
// route for showing the change password form
Route::get('/change-password-form', [AuthController::class, 'showChangePasswordForm']);

// route for handling password change (POST-only)
Route::post('/change-password', [AuthController::class, 'changePassword']);
