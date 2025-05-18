<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RumahSakitController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\SpesialisasiController;
use App\Http\Controllers\PraktekDokterController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/route-list', function () {
    $routes = collect(Route::getRoutes())->filter(function ($route) {
        return in_array('api', $route->middleware()) || str_starts_with($route->uri(), 'api');
    });
    return view('route-list', compact('routes'));
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::group(['prefix' => 'setting', 'middleware' => ['auth', 'role:admin']], function () {
        Route::resource('roles', RoleController::class);
    });
    Route::resource('users', UserController::class);

    Route::resource('rumah_sakits', RumahSakitController::class);
    Route::resource('dokters', DokterController::class);
    Route::resource('spesialisasis', SpesialisasiController::class);
    Route::resource('praktek-dokter', PraktekDokterController::class);

});

require __DIR__ . '/auth.php';
