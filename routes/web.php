<?php

use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'main']);
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/services', [PageController::class, 'services'])->name('services');
Route::get('/projects', [PageController::class, 'projects'])->name('projects');
Route::get('/blogs', [PageController::class, 'blogs'])->name('blogs');
Route::get('/single', [PageController::class, 'single'])->name('single');
Route::get('/contacts', [PageController::class, 'contacts'])->name('contacts');

/* Route::get('posts', [PostController::class, 'index'])->name('posts.index');     // ruyxatni kurish
Route::get('posts/{post}', [PageController::class, 'show'])->name('posts.show');     // 1 object get qilish
Route::get('posts/create', [PageController::class, 'create'])->name('posts.create');     // yangi yaratish
Route::post('posts/create', [PageController::class, 'store'])->name('posts.store');     // yangini yuborish
Route::get('posts/{post}/edit', [PageController::class, 'edit'])->name('posts.edit');     // update qilish
Route::put('posts/{post}/edit', [PageController::class, 'update'])->name('posts.update');     // update ni yuborish
Route::delete('posts/{post}/delete', [PageController::class, 'delete'])->name('posts.delete');     // ochirish */

Route::resource('posts', PostController::class); // 6 qator sorovni ozi bajaradi