<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JobSeekerController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);
Route::get('jobseeker/{jobseeker}', [HomeController::class, 'jobseekerDetail']);



Route::get('admin', [DashboardController::class, 'index'])->middleware('auth');

Route::get('login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('login', [LoginController::class, 'login']);
Route::post('register', [LoginController::class, 'register']);
Route::post('logout', [LoginController::class, 'logout']);

Route::put('admin/jobseeker/status/{jobseeker}', [JobSeekerController::class, 'updateStatus']);
Route::resource('admin/jobseeker', JobSeekerController::class);

Route::resource('admin/company', CompanyController::class);
Route::put('admin/posts/status/{post}', [PostController::class, 'updateStatus']);
Route::get('admin/posts/createSlug', [PostController::class, 'createSlug']);
Route::resource('admin/posts', PostController::class);
