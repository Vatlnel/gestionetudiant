<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');


use Illuminate\Support\Facades\DB;

Route::get('/dbcheck', function () {
    try {
        $name = DB::connection()->getDatabaseName();
        return "✅ Connecté à la base : $name";
    } catch (\Exception $e) {
        return "❌ Erreur de connexion : " . $e->getMessage();
    }
});