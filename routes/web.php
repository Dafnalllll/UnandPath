<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\VerificationController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PersetujuanController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminController;


// ✅ Resource routes
Route::resource('verifications', VerificationController::class);
Route::resource('categories', CategoryController::class);
Route::resource('activities', ActivityController::class);

// ✅ Auth routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::get('/signup', [AuthController::class, 'showRegisterForm'])->name('signup');
Route::post('/signup', [AuthController::class, 'register'])->name('signup.submit');

// ✅ User routes (middleware: auth, user)
Route::middleware(['auth', 'user'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/tambahkegiatan', [CategoryController::class, 'tambahKegiatanView']);
    Route::get('/laporanskpi', fn() => view('user.laporanskpi'));
    Route::get('/data', [ActivityController::class, 'showByCategory'])->name('data');
    


    Route::get('/persetujuanadmin', [PersetujuanController::class, 'index'])->name('persetujuanadmin');

 
    Route::post('/documents', [DocumentController::class, 'store'])->name('documents.store');

    Route::get('/dokumenakademik', [DocumentController::class, 'akademik'])->name('dokumen.akademik');
    Route::get('/dokumennonakademik', [DocumentController::class, 'nonakademik'])->name('dokumen.nonakademik');
    
   


    Route::get('/activities/create', [ActivityController::class, 'create'])->name('activities.create');
    Route::post('/activities', [ActivityController::class, 'store'])->name('activities.store');
});

// ✅ Admin routes (middleware: auth, admin)
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
});


Route::put('/activities/{id}/approve', [ActivityController::class, 'approve'])->name('activities.approve');
Route::put('/activities/{id}/reject', [ActivityController::class, 'reject'])->name('activities.reject');

// ✅ Home
Route::get('/', fn() => view('Pages.home'))->name('home');

// ✅ Logout
Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/');
})->name('logout');

// ✅ Fallback 404
Route::fallback(function () {
    return response()->view('Pages.pagenotfound', [], 404);
});
