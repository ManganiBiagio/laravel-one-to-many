<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\TypeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProfileController;
use App\Models\Type;
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

Route::get('/', [PageController::class,"index"])->name("index");



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::middleware(['auth', 'verified'])
    ->prefix("admin") // porzione di uri che verrà inserita prima di ogni rotta
    ->name("admin.") // porzione di testo inserita prima del name di ogni rotta
    ->group(function () {
        Route::get('/dashboard', [DashboardController::class, "home"])->name('dashboard');
        
        

        Route::resource("projects", ProjectController::class);
       
        Route::prefix("types")
        ->name("types.")
        ->group(function(){
            Route::get("/",[TypeController::class,"index"])->name("index");
            Route::get("/create",[TypeController::class,"create"])->name("create");
            Route::post("/", [TypeController::class, "store"])->name("store");
            Route::delete("/{type}/{destroyAnyway?}", [TypeController::class, "destroy"])->name("destroy");

        });
       
    });
       