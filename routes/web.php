<?php

use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\NotificationController;

Route::get('/', [PageController::class, 'main'])->name('main');
Route::get('about', [PageController::class, 'about'])->name('about');
Route::get('services', [PageController::class, 'services'])->name('services');
Route::get('projects', [PageController::class, 'projects'])->name('projects');
Route::get('single', [PageController::class, 'single'])->name('single');
Route::get('contacts', [PageController::class, 'contacts'])->name('contacts');

Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('authenticate', [AuthController::class, 'authenticate'])->name('authenticate');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');
Route::get('register', [AuthController::class, 'register'])->name('register');

Route::post('register', [AuthController::class, 'register_store'])->name('register.store');

Route::middleware('auth')->group(function() {
Route::get('notifications/{notification}/read', [NotificationController::class, 'read'])->name('notifications.read');
});

Route::get('language/{locale}', [LanguageController::class, 'change_locale'])->name('locale.change');

Route::resources([
  'posts' => PostController::class,
  'comments' => CommentController::class,
  'users' => UserController::class,
  'notifications' => NotificationController::class,
]);                                        // 6 qator sorovni ozi bajaradi
