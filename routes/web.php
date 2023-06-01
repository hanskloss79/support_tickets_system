<?php

use Illuminate\Support\Facades\Route;

Route::get('/', App\Http\Livewire\Home::class)->name('home')->middleware('auth');
Route::get('/login', App\Http\Livewire\Login::class)->name('login')->middleware('guest');
Route::get('/register', App\Http\Livewire\Register::class)->name('register')->middleware('guest');