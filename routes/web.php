<?php

use App\Livewire\Chats;
use App\Livewire\ChatPage;
use App\Http\Middleware\Login;
use App\Livewire\LoginRegister;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginRegisterController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/chats' , Chats::class)->name('chats')->middleware('login');
Route::get('/chat-page' , ChatPage::class);
Route::post('/login' , [LoginRegisterController::class, 'Login'])->name('user.auth.login');
Route::post('/register' , [LoginRegisterController::class, 'Register'])->name('user.auth.register');
Route::get('/login-register-form' , LoginRegister::class)->name('user.auth.login-register-form');
Route::get('/logout' , [LoginRegister::class , 'Logout'])->name('user.auth.logout');
