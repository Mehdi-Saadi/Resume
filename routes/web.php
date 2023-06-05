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
    Route::get('/skill', [AdminController::class, 'skill'])->name('skillPage');
    Route::post('/skill/store', [AdminController::class, 'storeSkills'])->name('skillStore');
    Route::post('/skill/update', [AdminController::class, 'updateSkills'])->name('skillUpdate');
    Route::delete('/skill/delete', [AdminController::class, 'deleteSkills'])->name('skillDelete');
    Route::get('/sample', [AdminController::class, 'sample'])->name('samplePage');

});
