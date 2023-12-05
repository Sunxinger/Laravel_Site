<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\HomeController;
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

/* Route::get('/', function () {
    return view('welcome');
}); */

Route::get('/', [HomeController::class, 'index']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('/uploads', [UploadController::class, 'index']);

Route::post('/uploads', [UploadController::class, 'store']);

Route::get('/uploads/create', [UploadController::class, 'create'])->middleware(['auth', 'verified']);

Route::get('/uploads/{upload}/edit/', [UploadController::class, 'edit']);

Route::get('/uploads/{upload}/{originalName?}', [UploadController::class, 'show']);

Route::delete('/uploads/{upload}', [UploadController::class, 'destroy']);

Route::put('/uploads/{upload}', [UploadController::class, 'update']);

Route::middleware(['is_admin'])->group(function () {
    
    Route::get('/uploads', function () {
       
        return view('uploads.index');
    });

});




require __DIR__.'/auth.php';




