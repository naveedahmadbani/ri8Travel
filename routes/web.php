<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\{HomeController,VisasController,UserController};
use App\Http\Controllers\LeadController;

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

Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index')->name('u.home');
    Route::get('/services', 'services')->name('services');
    Route::get('/packages', 'packages')->name('packages');
    Route::get('/contact', 'contact')->name('contact');
    Route::get('/abou-us', 'abouUs')->name('abou.us');
});
Route::controller(HomeController::class)->group(function () {
    Route::get('/visas/{id?}', 'visaDetails')->name('visa.details');
    Route::post('/visa-request', 'visaRequest')->name('visa.request');
});
Route::controller(LeadController::class)->group(function () {
    Route::post('/visa-request', 'visaRequest')->name('visa.request');
    Route::post('/assign-lead', 'assignLead')->name('assign.lead');
    Route::post('/lead-status-update', 'leadStatusUpdate');
});

Auth::routes();

Route::get('/home', [AdminController::class, 'index'])->name('home');


Route::prefix('lead')->name('lead.')->group(function() {
    Route::get('list', [LeadController::class, 'index'])->name('list');
    Route::get('create', [LeadController::class, 'createLead'])->name('create');
    Route::post('store', [LeadController::class, 'storeLead'])->name('store');
    
});
// Route::prefix('visa')->name('visa.')->group(function() {
//     Route::get('list', [VisasController::class, 'index'])->name('list');
//     Route::get('create', [VisasController::class, 'create'])->name('create');
//     Route::post('store', [VisasController::class, 'store'])->name('store');
//     Route::get('edit/{id}', [VisasController::class, 'edit'])->name('edit');
//     Route::post('update', [VisasController::class, 'update'])->name('update');
//     Route::get('delete/{id}', [VisasController::class, 'delete'])->name('delete');
// });

Route::resource('/visa', VisasController::class);
Route::controller(VisasController::class)->group(function () {
    Route::get('visa/delete/{id}', 'delete')->name('visa.delete');
});

Route::resource('/user', UserController::class);
Route::controller(UserController::class)->group(function () {
    Route::get('user/delete/{id}', 'delete')->name('user.delete');
});