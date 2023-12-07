<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CandidateController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\OperatorController;
use App\Http\Controllers\PollingBoothController;
use App\Http\Controllers\StudyProgramController;
use App\Http\Controllers\VoterController;
use App\Http\Controllers\VoterStatusController;
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

Route::post('/login/post', [LoginController::class, 'handleLogin'])->name('login.post');

Route::group(['prefix' => 'master', 'middleware' => ['auth:web,webvoter', 'verified']], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('/operator', OperatorController::class)->only(['index', 'create', 'store', 'edit', 'update', 'destroy']);

    Route::name('voter.')->prefix('voters')->group(function () {
        Route::resource('study-program', StudyProgramController::class)->only(['index', 'create', 'store', 'destroy']);
        Route::resource('grade', GradeController::class)->only(['index', 'create', 'store', 'destroy']);
        Route::resource('data', VoterController::class)->only(['index', 'create', 'store', 'edit', 'update', 'destroy']);
        Route::post('/data/import', [VoterController::class, 'import'])->name('data.import');
    });

    Route::resource('/candidate', CandidateController::class)->only(['index', 'create', 'store', 'edit', 'update', 'destroy']);
    route::resource('/polling-booth', PollingBoothController::class);

    Route::name('election-status.')->prefix('election-status')->group(function () {
        Route::get('/already', [VoterStatusController::class, 'already'])->name('already');
        Route::get('/notyet', [VoterStatusController::class, 'notyet'])->name('notyet');
    });
});
