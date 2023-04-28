<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{HomeController,VisasController};

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
})->name('home');
Route::get('/services', [HomeController::class, 'services'])->name('services');
Route::get('/packages', [HomeController::class, 'packages'])->name('packages');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::get('/abou-us', [HomeController::class, 'abouUs'])->name('abou.us');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/visa/list', [VisasController::class, 'index'])->name('visa.list');
Route::get('/visa/create', [VisasController::class, 'create'])->name('visa.create');
