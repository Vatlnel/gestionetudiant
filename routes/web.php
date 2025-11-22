<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\FiliereController;
use App\Http\Controllers\UniversityController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\AdminAuthController;


use Illuminate\Support\Facades\DB;
use App\Models\Student;
use App\Models\Admin;
use App\Models\Filiere;
use App\Models\Site;
use App\Models\University;



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








Route::get('/debug-db', function () {
    try {
        DB::connection()->getPdo();
        return "✅ Connexion OK à PostgreSQL";
    } catch (\Exception $e) {
        return "❌ Erreur DB : " . $e->getMessage();
    }
});

Route::get('/debug-students', function () {
    try {
        return "Students count: " . Student::count();
    } catch (\Exception $e) {
        return "Erreur Students: " . $e->getMessage();
    }
});

Route::get('/debug-admins', function () {
    try {
        return "Admins count: " . Admin::count();
    } catch (\Exception $e) {
        return "Erreur Admins: " . $e->getMessage();
    }
});

Route::get('/debug-filieres', function () {
    try {
        return "Filieres count: " . Filiere::count();
    } catch (\Exception $e) {
        return "Erreur Filieres: " . $e->getMessage();
    }
});

Route::get('/debug-sites', function () {
    try {
        return "Sites count: " . Site::count();
    } catch (\Exception $e) {
        return "Erreur Sites: " . $e->getMessage();
    }
});

Route::get('/debug-universities', function () {
    try {
        return "Universities count: " . University::count();
    } catch (\Exception $e) {
        return "Erreur Universities: " . $e->getMessage();
    }
});