<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WebController;
use App\Http\Middleware\CheckLoginMiddleware;
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
// Route::middleware()
Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'processLogin'])->name('login.process');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');
Route::group(['middleware' => CheckLoginMiddleware::class], function () {
    Route::get('user', [UserController::class, 'index'])->name('user.index');
    Route::get('user/create', [UserController::class, 'create'])->name('user.create');
    Route::post('user/create', [UserController::class, 'store'])->name('user.store');
    Route::get('user/show/{user}', [UserController::class, 'show'])->name('user.show');
    Route::get('user/edit/{user}', [UserController::class, 'edit'])->name('user.edit');
    Route::put('user/edit/{user}', [UserController::class, 'update'])->name('user.update');
    Route::get('user/delete/{user}', [UserController::class, 'destroy'])->name('user.delete');

    Route::get('web', [WebController::class, 'index'])->name('web.index');
    Route::get('web/create', [WebController::class, 'create'])->name('web.create');
    Route::post('web/create', [WebController::class, 'store'])->name('web.store');
    Route::get('web/show/{web}', [WebController::class, 'show'])->name('web.show');
    Route::get('web/edit/{web}', [WebController::class, 'edit'])->name('web.edit');
    Route::put('web/edit/{web}', [WebController::class, 'update'])->name('web.update');
    Route::get('web/delete/{web}', [WebController::class, 'destroy'])->name('web.delete');
});