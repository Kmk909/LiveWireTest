<?php

use App\Http\Livewire\Home;
use App\Http\Livewire\Login;
use App\Http\Livewire\Register;
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

Route::get('/', Home::class);

Route::get('/home', Home::class);

Route::get('/login', Login::class);

Route::get('/register', Register::class);
