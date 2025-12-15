<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\NewsletterController;

Route::get('/', [HomeController::class, 'home'])->name('home');

// Categories Route
Route::get('/admin/categories/create', [CategoryController::class, 'create'])->name('admin.categories.create');
Route::post('/admin/categories/store', [CategoryController::class, 'store'])->name('admin.categories.store');
Route::get('/admin/categories/view', [CategoryController::class, 'show'])->name('admin.categories.view');
Route::get('/admin/categories/{id}/edit', [CategoryController::class, 'edit'])->name('admin.categories.edit');
Route::post('/admin/categories/{id}/update', [CategoryController::class, 'update'])->name('admin.categories.update');
Route::delete('/admin/categories/{id}/delete', [CategoryController::class, 'destroy'])->name('admin.categories.destroy');
Route::get('/pages/categories/view', [CategoryController::class, 'category'])->name('pages.categories.view');
// routes/web.php
Route::get('/category/{id}', [HomeController::class, 'filterByCategory'])->name('category.posts');


// Posts Route
Route::get('/admin/posts/create', [PostController::class, 'create'])->name('admin.posts.create');
Route::post('/admin/posts/store', [PostController::class, 'store'])->name('admin.posts.store');
Route::get('/admin/posts/view', [PostController::class, 'show'])->name('admin.posts.view');
Route::get('/admin/posts/{id}/edit', [PostController::class, 'edit'])->name('admin.posts.edit');
Route::post('/admin/posts/{id}/update', [PostController::class, 'update'])->name('admin.posts.update');
Route::delete('/admin/posts/{id}/delete', [PostController::class, 'destroy'])->name('admin.posts.destroy');
Route::get('/pages/posts/view', [PostController::class, 'post'])->name('pages.posts.view');
// Route::get('/pages/posts/view/{id}/article-post', [PostController::class, 'articlePost'])->name('pages.posts.view.article.post');
Route::get('/pages/posts/view/{id}/single-post', [PostController::class, 'singlePost'])->name('pages.posts.view.single.post');

// Newsletter
Route::post('/newsletter', [NewsletterController::class, 'newsletter'])->name('newsletter.submit');






// // logging auth
// Route::get('/auth/login', [UserAuthController::class, 'loginForm'])->name('auth.login');
// Route::post('/auth/login/submit', [UserAuthController::class, 'loginSubmit'])->name('auth.login.submit');

// // ->middleware('user.auth')
// Route::get('/dashboard', [DashboardController::class, 'dashboard'])->middleware('user.auth')->name('dashboard');
// Route::get('/auth/logout', [UserAuthController::class, 'logout'])->name('auth.logout');


// logging auth
Route::get('/auth/login', [UserAuthController::class, 'loginForm'])->name('auth.login');
Route::post('/auth/login/submit', [UserAuthController::class, 'loginSubmit'])->name('auth.login.submit');

// ->middleware('user.auth')
Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
Route::get('/auth/logout', [UserAuthController::class, 'logout'])->name('auth.logout');



