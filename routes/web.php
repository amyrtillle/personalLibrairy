<?php
use App\Http\Controllers\ControlerUsagers;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ControleurLivres;
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
Route::resource('usagers', ControlerUsagers::class);

Route::resource('livres', ControleurLivres::class);

Route::get('/', function () {
    return view('accueil');
});

Route::get('/tableaudebord', function () {
    return view('tableaudebord');
})->middleware(['auth', 'verified'])->name('tableaudebord');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';