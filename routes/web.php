<?php

use App\Http\Controllers\GeoJSONController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

Auth::routes();

Route::get('/test-database', function () {
    try {
        // Establish the database connection
        DB::connection()->getPdo();

        echo "Connected to the database successfully!";
    } catch (\Exception $e) {
        die("Could not connect to the database. Error: " . $e->getMessage());
    }
});

Route::get('geojson/{table}/{geom?}', GeoJSONController::class);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');

Route::get('/map', [App\Http\Controllers\MapController::class, 'index'])->name('map');

Route::get('/about', [App\Http\Controllers\AboutController::class, 'index'])->name('about');

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/users', [App\Http\Controllers\UsersController::class, 'index'])->name('users');

    Route::get('/settings', [App\Http\Controllers\SettingsController::class, 'index'])->name('settings');

    Route::delete('/users/{user}', [App\Http\Controllers\UsersController::class, 'destroy'])->name('users.destroy');

    Route::post('/editpoin', [App\Http\Controllers\EditPointController::class, 'store'])->name('poin.edit');

    Route::patch('/editpoin/{poin}', [App\Http\Controllers\EditPointController::class, 'update'])->name('poin.update');

    Route::delete('/editpoin/{poin}', [App\Http\Controllers\EditPointController::class, 'destroy'])->name('poin.delete');
});
