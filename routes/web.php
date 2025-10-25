<?php

use App\Livewire\Chats;
use App\Livewire\ChatPage;
use App\Http\Middleware\Login;
use App\Livewire\LoginRegister;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginRegisterController;
use App\Livewire\ForgotPassword;
use App\Livewire\ResetPassword;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/chats' , Chats::class)->name('chats')->middleware('login');
Route::get('/chat-page/{receiver_id}' , ChatPage::class)->name('chat-page');

Route::post('/login' , [LoginRegisterController::class, 'Login'])->name('user.auth.login');
Route::post('/register' , [LoginRegisterController::class, 'Register'])->name('user.auth.register');
Route::get('/login-register-form' , LoginRegister::class)->name('user.auth.login-register-form');
Route::get('/logout' , [LoginRegister::class , 'Logout'])->name('user.auth.logout');

Route::get('/password-reset/show-link' , ForgotPassword::class)->name('password.reset.show');
Route::get('/password-reset/form/{token}' , ResetPassword::class )->name('password.reset.form');
