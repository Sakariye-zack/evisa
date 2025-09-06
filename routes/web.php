<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Breeze (auth/profile)
use App\Http\Controllers\ProfileController;

// E-Visa controllers
use App\Http\Controllers\ApplicantController;
use App\Http\Controllers\OfficerController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\VerifyController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Home → u dir login
Route::get('/', fn () => redirect()->route('login'))->name('home');

// ---- Routes u baahan auth + email verified ----
Route::middleware(['auth', 'verified'])->group(function () {

    // Applicant
    Route::middleware('role:applicant')->group(function () {
        Route::get('/applications',        [ApplicantController::class, 'index'])->name('applications.index');
        Route::get('/applications/create', [ApplicantController::class, 'create'])->name('applications.create');
        Route::post('/applications',       [ApplicantController::class, 'store'])->name('applications.store');
        Route::get('/applications/{id}',   [ApplicantController::class, 'show'])->name('applications.show');
    });

    // Officer
    Route::middleware('role:officer')->group(function () {
        Route::get('/reviews',       [OfficerController::class, 'index'])->name('reviews.index');
        Route::post('/reviews/{id}', [OfficerController::class, 'review'])->name('reviews.review');
    });

    // Admin
    Route::middleware('role:admin')->group(function () {
        Route::get('/admin', [DashboardController::class, 'index'])->name('admin.dashboard');
    });

    // Breeze profile
    Route::get('/profile',   [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile',[ProfileController::class, 'destroy'])->name('profile.destroy');
});

// ---------- Public ----------
Route::get('/verify/{code}', [VerifyController::class, 'show'])->name('verify.show');

// ---------- Fix: Breeze expects `dashboard` ----------
Route::get('/dashboard', fn () => redirect()->route('post.login'))
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// ---------- Post-login redirect (role-based) ----------
Route::get('/post-login', function () {
    $u = Auth::user();

    if ($u && $u->hasRole('admin')) {
        return redirect()->route('admin.dashboard');
    }

    if ($u && $u->hasRole('officer')) {
        return redirect()->route('reviews.index');
    }

    // default: applicant
    return redirect()->route('applications.index');
})->middleware(['auth', 'verified'])->name('post.login');

// Breeze auth routes (login/register/forgot)
require __DIR__ . '/auth.php';