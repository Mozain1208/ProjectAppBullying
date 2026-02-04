<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ConsultationController;
use App\Http\Controllers\ContentController;

// Landing page - redirects to dashboard if authenticated
Route::get('/', [HomeController::class, 'index'])->name('home');

// Dashboard - protected by auth middleware
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Authentication Routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

// Registration Routes
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);
Route::get('/verify-email', [RegisterController::class, 'showVerifyForm'])->name('verification.notice');
Route::post('/verify-email', [RegisterController::class, 'verifyEmail'])->name('verification.verify');
Route::post('/verify-email/resend', [RegisterController::class, 'resendCode'])->name('verification.resend');

// Password Reset Routes
Route::get('/forgot-password', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'showForgotForm'])->name('password.request');
Route::post('/forgot-password', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'sendResetCode'])->name('password.email');
Route::get('/verify-code', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'showVerifyForm'])->name('password.verify.form');
Route::post('/verify-code', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'verifyCode'])->name('password.verify');
Route::get('/reset-password', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'showResetForm'])->name('password.reset.form');
Route::post('/reset-password', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'resetPassword'])->name('password.update');

// Public Content Pages (Accessible without login)
Route::prefix('content')->group(function () {
    Route::get('/children', [ContentController::class, 'children'])->name('content.children');
    Route::get('/children/bullying-info', [ContentController::class, 'bullyingInfo'])->name('content.bullyingInfo');
    Route::get('/children/bullying-quiz', [ContentController::class, 'bullyingQuiz'])->name('content.bullyingQuiz');
    Route::get('/children/bully-quiz', [ContentController::class, 'bullyQuiz'])->name('content.bullyQuiz');
    Route::get('/children/bully-reflection', [ContentController::class, 'bullyReflection'])->name('content.bullyReflection');
    Route::get('/teens', [ContentController::class, 'teens'])->name('content.teens');
    Route::get('/teens/sexual-harassment', [ContentController::class, 'sexualHarassment'])->name('content.sexualHarassment');
    Route::get('/teens/cyberbullying-info', [ContentController::class, 'cyberbullyingInfo'])->name('content.cyberbullyingInfo');
    Route::get('/teens/digital-footprint', [ContentController::class, 'digitalFootprint'])->name('content.digitalFootprint');
    
    Route::get('/adults', [ContentController::class, 'adults'])->name('content.adults');
    Route::get('/adults/early-detection', [ContentController::class, 'earlyDetection'])->name('content.earlyDetection');
    Route::get('/adults/myths-and-facts', [ContentController::class, 'mythsAndFacts'])->name('content.mythsAndFacts');
    Route::get('/adults/legal-protection', [ContentController::class, 'legalProtection'])->name('content.legalProtection');
    
    // General Content
    Route::get('/what-is-bullying', [ContentController::class, 'whatIsBullying'])->name('content.whatIsBullying');
    Route::get('/types-of-bullying', [ContentController::class, 'typesOfBullying'])->name('content.typesOfBullying');
    Route::get('/impact-of-bullying', [ContentController::class, 'impactOfBullying'])->name('content.impactOfBullying');
    
    // Science/Pojok Ilmu Pages
    Route::get('/science/biology', [ContentController::class, 'scienceBiology'])->name('content.scienceBiology');
    Route::get('/science/psychology', [ContentController::class, 'sciencePsychology'])->name('content.sciencePsychology');
    Route::get('/science/social', [ContentController::class, 'scienceSocial'])->name('content.scienceSocial');
    Route::get('/science/spiritual', [ContentController::class, 'scienceSpiritual'])->name('content.scienceSpiritual');
});

// Protected Routes (require authentication)
Route::middleware(['auth'])->group(function () {
    // Report Routes
    Route::get('/report', [ReportController::class, 'create'])->name('report.create');
    Route::post('/report', [ReportController::class, 'store'])->name('report.store');
    Route::get('/my-reports', [ReportController::class, 'index'])->name('report.index');

    // Consultation Routes
    Route::get('/consultation', [ConsultationController::class, 'index'])->name('consultation.index');
    Route::post('/consultation', [ConsultationController::class, 'store'])->name('consultation.store');
    Route::get('/consultation/{id}', [ConsultationController::class, 'show'])->name('consultation.show');
    Route::post('/consultation/{id}/reply', [ConsultationController::class, 'reply'])->name('consultation.reply');

    // Admin Routes
    Route::prefix('admin')->middleware(['auth'])->group(function () {
        Route::get('/dashboard', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.dashboard');
        Route::get('/reports', [App\Http\Controllers\AdminController::class, 'reports'])->name('admin.reports');
        Route::get('/report/{id}', [App\Http\Controllers\AdminController::class, 'showReport'])->name('admin.report.show');
        Route::post('/report/{id}/message', [App\Http\Controllers\AdminController::class, 'storeReportMessage'])->name('admin.report.message');
        Route::get('/consultations', [App\Http\Controllers\AdminController::class, 'consultations'])->name('admin.consultations');
        Route::patch('/report/{id}/status', [App\Http\Controllers\AdminController::class, 'updateReportStatus'])->name('admin.report.status');
        Route::get('/users', [App\Http\Controllers\AdminController::class, 'users'])->name('admin.users');
        Route::get('/user/{id}', [App\Http\Controllers\AdminController::class, 'showUser'])->name('admin.user.show');
        Route::patch('/user/{id}/action', [App\Http\Controllers\AdminController::class, 'updateUserAction'])->name('admin.user.action');
        
        Route::get('/audit-logs', [App\Http\Controllers\AdminController::class, 'auditLogs'])->name('admin.audit-logs');
        Route::get('/settings', [App\Http\Controllers\AdminController::class, 'settings'])->name('admin.settings');
        Route::post('/settings', [App\Http\Controllers\AdminController::class, 'updateSettings'])->name('admin.settings.update');
        Route::get('/report/{id}/timeline', [App\Http\Controllers\ReportHandlingController::class, 'index'])->name('admin.report.timeline');
        Route::post('/report/{id}/handling', [App\Http\Controllers\ReportHandlingController::class, 'store'])->name('admin.report.handling.store');
        Route::delete('/report/{id}', [App\Http\Controllers\AdminController::class, 'deleteReport'])->name('admin.report.delete');
    });

    // User Report Detail Route
    Route::get('/report/{id}', [ReportController::class, 'show'])->name('report.show');
    Route::post('/report/{id}/message', [ReportController::class, 'storeMessage'])->name('report.message');
});
