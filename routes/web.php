<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\FiliereController;
use App\Http\Controllers\UniversityController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\AdminAuthController;


use Illuminate\Support\Facades\DB;

// 🏠 Page d’accueil / dashboard
Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

// 🔐 Authentification admin
Route::get('/admin/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class, 'login']);
Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

// 🧑‍🎓 Étudiants
Route::resource('students', StudentController::class);

// 🎓 Filières
Route::resource('filieres', FiliereController::class);

// 🏛️ Universités
Route::resource('universities', UniversityController::class);

// 📍 Sites
Route::resource('sites', SiteController::class);




Route::get('/debug', function () {
    try {
        return Student::count();
    } catch (\Exception $e) {
        return $e->getMessage();
    }
});



use App\Models\Admin;

Route::get('/debug-admin', function () {
    try {
        return "Admin count: " . Admin::count();
    } catch (\Exception $e) {
        return "Erreur: " . $e->getMessage();
    }
});





Route::get('/debug-db', function () {
    try {
        DB::connection()->getPdo();
        return "Connexion OK à PostgreSQL";
    } catch (\Exception $e) {
        return "Erreur DB : " . $e->getMessage();
    }
});