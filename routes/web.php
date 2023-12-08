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
use App\Http\Controllers\WitnessController;
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

Route::group(['prefix' => 'master', 'middleware' => ['auth:web,webvoter,webwitness', 'verified']], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::group(['middleware' => ['role:Administrator']], function () {    
        // Operator
        Route::get('/operator/index', [OperatorController::class, 'index'])->name('operator.index');
        Route::get('/operator/create', [OperatorController::class, 'create'])->name('operator.create');
        Route::post('/operator/store', [OperatorController::class, 'store'])->name('operator.store');
        Route::get('/operator/{id}/edit', [OperatorController::class, 'edit'])->name('operator.edit');
        Route::put('/operator/update/{id}', [OperatorController::class, 'update'])->name('operator.update');
        Route::delete('/operator/{id}/destroy', [OperatorController::class, 'destroy'])->name('operator.destroy');

        // Study Program
        Route::get('/study-program/create', [StudyProgramController::class, 'create'])->name('study-program.create');
        Route::post('/study-program/store', [StudyProgramController::class, 'store'])->name('study-program.store');
        Route::get('/study-program/{id}/edit', [StudyProgramController::class, 'edit'])->name('study-program.edit');
        Route::put('/study-program/update/{id}', [StudyProgramController::class, 'update'])->name('study-program.update');
        Route::delete('/study-program/{id}/destroy', [StudyProgramController::class, 'destroy'])->name('study-program.destroy');

        // Grade
        Route::get('/grade/create', [GradeController::class, 'create'])->name('grade.create');
        Route::post('/grade/store', [GradeController::class, 'store'])->name('grade.store');
        Route::get('/grade/{id}/edit', [GradeController::class, 'edit'])->name('grade.edit');
        Route::put('/grade/update/{id}', [GradeController::class, 'update'])->name('grade.update');
        Route::delete('/grade/{id}/destroy', [GradeController::class, 'destroy'])->name('grade.destroy');
    });

    Route::group(['middleware' => ['role:Administrator|Operator']], function () {    
        // Study Program
        Route::get('/study-program/index', [StudyProgramController::class, 'index'])->name('study-program.index');

        // Grade
        Route::get('/grade/index', [GradeController::class, 'index'])->name('grade.index');

        // Voters
        Route::get('/voter/index', [VoterController::class, 'index'])->name('voter.index');
        Route::get('/voter/create', [VoterController::class, 'create'])->name('voter.create');
        Route::post('/voter/store', [VoterController::class, 'store'])->name('voter.store');
        Route::get('/voter/{id}/edit', [VoterController::class, 'edit'])->name('voter.edit');
        Route::put('/voter/update/{id}', [VoterController::class, 'update'])->name('voter.update');
        Route::delete('/voter/{id}/destroy', [VoterController::class, 'destroy'])->name('voter.destroy');
        Route::post('/voter/import', [VoterController::class, 'import'])->name('voter.import');

        // Candidate
        Route::get('/candidate/index', [CandidateController::class, 'index'])->name('candidate.index');
        Route::get('/candidate/create', [CandidateController::class, 'create'])->name('candidate.create');
        Route::post('/candidate/store', [CandidateController::class, 'store'])->name('candidate.store');
        Route::get('/candidate/{id}/edit', [CandidateController::class, 'edit'])->name('candidate.edit');
        Route::put('/candidate/update/{id}', [CandidateController::class, 'update'])->name('candidate.update');
        Route::delete('/candidate/{id}/destroy', [CandidateController::class, 'destroy'])->name('candidate.destroy');

        // Witness
        Route::get('/witness/index', [WitnessController::class, 'index'])->name('witness.index');
        Route::get('/witness/create', [WitnessController::class, 'create'])->name('witness.create');
        Route::post('/witness/store', [WitnessController::class, 'store'])->name('witness.store');
        Route::get('/witness/{id}/edit', [WitnessController::class, 'edit'])->name('witness.edit');
        Route::put('/witness/update/{id}', [WitnessController::class, 'update'])->name('witness.update');
        Route::delete('/witness/{id}/destroy', [WitnessController::class, 'destroy'])->name('witness.destroy');
        Route::post('/witness/import', [WitnessController::class, 'import'])->name('witness.import');
    });

    route::resource('/polling-booth', PollingBoothController::class);

    Route::group(['middleware' => ['role:Administrator|Operator|Witness']], function () {   
        // Election Status 
        Route::name('election-status.')->prefix('election-status')->group(function () {
            Route::get('/already', [VoterStatusController::class, 'already'])->name('already');
            Route::get('/notyet', [VoterStatusController::class, 'notyet'])->name('notyet');
        });
    });
});
