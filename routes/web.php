<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\NoteController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/login',[CustomAuthController::class,'login'])->name("auth.login");

Route::get('/registration',[CustomAuthController::class,"registration"])->name('auth.registration');

Route::post('/register',[CustomAuthController::class,'registerUser'])->name('registerUser');

Route::post('/login-user',[CustomAuthController::class,'loginUser'])->name('loginUser');

Route::get('/dashboard',[CustomAuthController::class,'dashboard'])->name('dashboard');
// ->middleware('isLoggedIn');

Route::get('/logout',[CustomAuthController::class,'logout'])->name('logout');


Route::middleware('auth')->group(function () {
    //SHOWALLNOTES
    Route::get('/notes', [NoteController::class, 'index'])->name('notes.index');
    //CREATE
    Route::get('/notes/create', [NoteController::class, 'create'])->name('notes.create');
    Route::post('/notes', [NoteController::class, 'store'])->name('notes.store');
    //READ
    //UPDATE
    //DELETE
    Route::delete('/notes/{note}', [NoteController::class, 'destroy'])->name('notes.destroy');
});






