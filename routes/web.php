<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AlbumController;

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
    return view('auth.login');
});

// Route::get('/dashboard', [DashboardController::class, 'index'])
//     ->middleware(['auth', 'verified'])->name('dashboard');
// Route::post('/album', [AlbumController::class, 'getAlbum'])->name('get.album');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::get('/album/{id}', [AlbumController::class, 'getAlbum'])->name('get.album');
    Route::put('/album', [AlbumController::class, 'update'])->name('update.album');
    Route::delete('/album', [AlbumController::class, 'delete'])->name('delete.album');
});

require __DIR__ . '/auth.php';
