<?php

use Illuminate\Support\Facades\Route;

Route::get('/', App\Http\Livewire\Home::class)->name('home');
Route::get('/login', App\Http\Livewire\Login::class)->name('login');
