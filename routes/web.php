<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VideoController;
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


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/', [HomeController::class, 'index'])->name('home.index');

    Route::get('/add-modul', [HomeController::class, 'getAllModul'])->name('modul.index');
    Route::post('/store-modul', [HomeController::class, 'storeNewModul'])->name('store.new.modul');
    

    Route::get('/video/otot', [VideoController::class, 'getVideoOtot'])->name('video.otot');
    Route::get('/video/pencernaan', [VideoController::class, 'getVideoPencernaan'])->name('video.pencernaan');
    Route::get('/video/pernapasan', [VideoController::class, 'getVideoPernapasan'])->name('video.pernapasan');
    Route::get('/video/ekstraksi', [VideoController::class, 'getVideoeksresi'])->name('video.eksresi');
});

require __DIR__.'/auth.php';
