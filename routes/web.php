<?php

use App\Http\Controllers\BukuController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PenulisController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//Buku
Route::get('/buku', [BukuController::class, 'index'])->name('buku');
Route::get('/buku/create', [BukuController::class, 'create']);
Route::post('/buku', [BukuController::class, 'store']);
Route::get('/buku/edit/{id}', [BukuController::class, 'edit']);
Route::get('/buku/show/{id}', [BukuController::class, 'show']);
Route::patch('/buku/{id}', [BukuController::class, 'update']);
Route::delete('/buku/{id}', [BukuController::class, 'destroy']);
Route::get('/buku/lihatdata/{id}', [BukuController::class, 'lihatdata'])->name('files.show');
Route::get('/image/{id}', [BukuController::class, 'tampilgambar'])->name('image.show');
Route::post('/posts/{id}/approve', [BukuController::class, 'approve'])->name('posts.approve');
Route::post('/posts/{id}/reject', [BukuController::class, 'reject'])->name('posts.reject');
//Penulis
Route::get('/penulis', [PenulisController::class, 'index']);
Route::get('/penulis/create', [PenulisController::class, 'create']);
Route::post('/penulis', [PenulisController::class, 'store']);
Route::get('/penulis/edit/{id}', [PenulisController::class, 'edit']);
Route::patch('/penulis/{id}', [PenulisController::class, 'update']);
Route::delete('/penulis/{id}', [PenulisController::class, 'destroy']);


//Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/images/{id}', [DashboardController::class, 'tampilgambar']);
Route::get('/show/{id}', [DashboardController::class, 'show']);
Route::get('/sinopsis', [DashboardController::class, 'sinopsis']);
Route::get('/books/search', [DashboardController::class, 'search'])->name('books.search');
Route::get('/books/approved', [DashboardController::class, 'showApprovedBooks'])->name('books.approved');





require __DIR__ . '/auth.php';
