<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController; 

Route::get('/', function () {
    return view('home');
}); 

Route::get('/login', function () {
    return view('login');
}); 


Route::get('/signup', function () {
    return view('signup');
}); 

Route::get('/dashboard', function () {
    return view('dashboard');
}); 

Route::get('/akademik', function () {
    return view('akademik');
});

Route::get('/nonakademik', function () {
    return view('nonakademik');
});

Route::get('/laporanskpi', function () {
    return view('laporanskpi');
});

Route::get('/persetujuanadmin', function () {
    return view('persetujuanadmin');
});

Route::get('/admin', function () {
    return view('admin');
});

Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::post('/signup', [AuthController::class, 'register'])->name('signup.submit');