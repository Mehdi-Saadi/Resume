<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ResumeController;

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

Route::get('/', [ResumeController::class, 'index'])->name('index');
Route::get('/details/{id}', [ResumeController::class, 'details'])->name('project_details');

Auth::routes(['verify' => true]);

Route::prefix('/admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin');
    Route::get('/resume', [AdminController::class, 'resume'])->name('resumePage');
    Route::post('/resume/update', [AdminController::class, 'updateResume'])->name('resumeUpdate');

    Route::prefix('/skill')->group(function () {
        Route::get('/', [AdminController::class, 'skill'])->name('skillPage');
        Route::post('/store', [AdminController::class, 'storeSkills'])->name('skillStore');
        Route::post('/update', [AdminController::class, 'updateSkills'])->name('skillUpdate');
        Route::delete('/delete', [AdminController::class, 'deleteSkills'])->name('skillDelete');
    });

    Route::prefix('/sample')->group(function () {
        Route::get('/', [AdminController::class, 'sample'])->name('samplePage');
        Route::post('/store', [AdminController::class, 'storeSample'])->name('sampleStore');
        Route::post('/update', [AdminController::class, 'updateSample'])->name('sampleUpdate');
        Route::delete('/delete', [AdminController::class, 'deleteSample'])->name('sampleDelete');
    });

});
