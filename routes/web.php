<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
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
    return view('welcome');
});


Route::prefix('/blog')->group(function() {
    Route::get('/liste', [BlogController::class, 'create'])->name('blog.liste');
    Route::post('/ekle', [BlogController::class, 'store'])->name('blog.ekle');
    Route::post('/guncelle/{id}', [BlogController::class, 'update'])->name('blog.guncelle');
    Route::get('/guncelle/{id}', [BlogController::class, 'update'])->name('blog.guncelle');
    Route::get('/sil/{id}', [BlogController::class, 'delete'])->name('blog.sil');
});

Route::prefix('/category')->group(function() {
    Route::get('/liste', [CategoryController::class, 'create'])->name('category.liste');
    Route::post('/ekle', [CategoryController::class, 'store'])->name('category.kaydet');
    Route::post('/guncelle/{id}', [CategoryController::class, 'update'])->name('category.guncelle');
    Route::get('/guncelle/{id}', [CategoryController::class, 'update'])->name('category.guncelle');
    Route::get('/sil/{id}', [CategoryController::class, 'delete'])->name('category.sil');
});
