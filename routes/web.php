<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CKEditorController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('backend.dashboard');
})->name('dashboard');

// Category Routes
Route::get('/admin/categories', [CategoryController::class, 'index'])->name('admin.categories');
Route::get('/categories/create', [CategoryController::class, 'create']);
Route::post('/admin/categories/insert', [CategoryController::class, 'insert'])->name('admin.categories.insert');
Route::get('/admin/categories/edit/{id}/{slug}', [CategoryController::class, 'edit']);
Route::post('/admin/categories/update/{id}/{slug}', [CategoryController::class, 'update'])->name('admin.categories.update');
Route::get('/admin/categories/show/{id}/{slug}', [CategoryController::class, 'show']);
Route::get('/admin/categories/delete/{id}', [CategoryController::class, 'destroy']);
Route::get('/admin/categories/trashed', [CategoryController::class, 'trashed']);
Route::get('/admin/categories/restore/{id}', [CategoryController::class, 'restore']);
Route::get('/admin/categories/forceDelete/{id}', [CategoryController::class, 'forceDelete']);

// Tags Routes
Route::get('/admin/tags', [TagController::class, 'index'])->name('admin.tags');
Route::get('/admin/tags/create', [TagController::class, 'create']);
Route::post('/admin/tags/store', [TagController::class, 'store'])->name('admin.tags.store');
Route::get('/admin/tags/edit/{id}/{slug}', [TagController::class, 'edit']);
Route::post('/admin/tags/update/{id}/{slug}', [TagController::class, 'update'])->name('admin.tags.update');
Route::get('/admin/tags/show/{id}/{slug}', [TagController::class, 'show']);
Route::get('/admin/tags/restore/{id}/{slug}', [TagController::class, 'restore']);
Route::get('/admin/tags/delete/{id}/{slug}', [TagController::class, 'destroy']);
Route::get('/admin/tags/trashed', [TagController::class, 'trashed']);
Route::get('/admin/tags/forceDelete/{id}/{slug}', [TagController::class, 'forceDelete']);

// Post Routes
Route::get('/admin/posts', [PostController::class, 'index'])->name('admin.posts');
Route::post('ckeditor/image_upload', [CKEditorController::class, 'upload'])->name('upload');
Route::get('/admin/posts/create', [PostController::class, 'create']);
Route::post('/admin/post/store', [PostController::class, 'store'])->name('admin.post.store');
Route::post('/admin/post/ckeditor', [PostController::class, 'ckeditor'])->name('admin.ckeditor.store');
Route::get('/admin/post/show/{id}/{slug}', [PostController::class, 'show']);
Route::get('/admin/post/edit/{id}/{slug}', [PostController::class, 'edit']);
Route::post('/admin/post/update/{id}/{slug}', [PostController::class, 'update'])->name('admin.post.update');
Route::post('/admin/post/ckeditor/update/{id}', [PostController::class, 'ckeditorUpdate'])->name('admin.ckeditor.update');