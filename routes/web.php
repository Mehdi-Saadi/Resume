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

Auth::routes();

Route::get('/admin', [AdminController::class, 'index'])->name('admin');
