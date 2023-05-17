<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UsernamesDataController;
use Illuminate\Support\Facades\Route;
use App\Models\ListUsernamesData;

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

Route::get('/dashboard', function () {
    $listUsernamesData = ListUsernamesData::get();

    return view('dashboard', compact('listUsernamesData'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::post('/data', [UsernamesDataController::class, 'upload'])->name('UsernamesData.upload');

require __DIR__.'/auth.php';
