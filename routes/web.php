<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\StoryController;
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

Route::get('/', [HomeController::class, 'index']);


Route::group(['middleware' => 'auth'], function () {

    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
    Route::get('/settings', [HomeController::class, 'settings'])->name('settings');
    Route::post('/settings', [HomeController::class, 'settingsUpdate'])->name('settings.update');

    Route::resource('/stories', StoryController::class);
});

require __DIR__.'/auth.php';
