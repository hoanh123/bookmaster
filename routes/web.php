<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\Auth\LoginController;
use App\Http\Controllers\User\Auth\LogoutController;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\ImportBookController;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::match(['get', 'post'], '/logout', [LogoutController::class, 'logout'])->name('logout');
Route::match(['get', 'post'], '/login', [LoginController::class, 'login'])->name('login');
Route::middleware('auth')->group(function (){
    Route::post('/book', [\App\Http\Controllers\BookController::class, 'index']);
    Route::get('/book', [\App\Http\Controllers\BookController::class, 'home'])->name('home');
});
Route::get('/bookex', [\App\Http\Controllers\ImportBookController::class, 'index']);
Route::get('/export', [\App\Http\Controllers\ImportBookController::class, 'export']);
Route::post('/import', [\App\Http\Controllers\ImportBookController::class, 'import']);
