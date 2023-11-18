<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\OperatorController;
use App\Http\Controllers\StudyProgramController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth/login');
});

Auth::routes([
    'register' => false,
]);

Route::group(['prefix' => 'master', 'middleware' => ['auth:sanctum', 'verified']], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('/operator', OperatorController::class)->only(['index', 'create', 'store', 'edit', 'update', 'destroy']);

    Route::name('voters.')->prefix('voters')->group(function () {
        Route::resource('study-program', StudyProgramController::class)->only(['index', 'create', 'store', 'destroy']);
        Route::resource('grade', GradeController::class)->only(['index', 'create', 'store', 'destroy']);
    });
});
