<?php

use App\Http\Controllers\Employer\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Employer\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Employer\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Employer\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Employer\Auth\NewPasswordController;
use App\Http\Controllers\Employer\Auth\PasswordResetLinkController;
use App\Http\Controllers\Employer\Auth\RegisteredUserController;
use App\Http\Controllers\Employer\Auth\VerifyEmailController;
use App\Http\Controllers\Employer\CompanyController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::prefix('employer')->middleware('guest:employer')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])
        ->name('employer.register');

    Route::post('register', [RegisteredUserController::class, 'register']);

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
        ->name('employer.login');

    Route::post('login', [AuthenticatedSessionController::class, 'login']);

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
        ->name('employer.password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'passwordResetLink'])
        ->name('employer.password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
        ->name('employer.password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'newPassword'])
        ->name('employer.password.store');
});

Route::prefix('employer')->middleware('auth:employer')->group(function () {
    Route::get('verify-email', EmailVerificationPromptController::class)
        ->name('employer.verification.notice');

    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
        ->middleware(['signed', 'throttle:6,1'])
        ->name('employer.verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
        ->middleware('throttle:6,1')
        ->name('employer.verification.send');

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
        ->name('employer.password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'confirmablePassword']);

    Route::post('logout', [AuthenticatedSessionController::class, 'logout'])
        ->name('employer.logout');

    Route::get('dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('employer.dashboard');

    Route::get('company', [CompanyController::class, 'index'])->name('employer.company');
    Route::post('store', [CompanyController::class, 'store'])->name('employer.company.store');
});
