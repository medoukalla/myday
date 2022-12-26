<?php

use App\Http\Controllers\CompleteController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
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


route::get('dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');

Route::resource('task', TaskController::class);
Route::resource('group', GroupController::class);
Route::resource('orders', OrderController::class);
Route::resource('complete', CompleteController::class);
Route::resource('user', UserController::class);


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Add task to finished tasks 
    Route::get('task_finished/{task}', [CompleteController::class, 'finished'])->name('task.finished');

});

require __DIR__.'/auth.php';
