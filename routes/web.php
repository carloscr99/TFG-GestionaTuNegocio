<?php

use Illuminate\Support\Facades\Route;
use RealRashid\SweetAlert\Facades\Alert;



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

// Route::resource('NewEmployer', 'EmployerController');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/NewEmployer', [App\Http\Controllers\EmployerController::class, 'index'])->name('NewEmployer');

Route::post('NewEmployer', [App\Http\Controllers\EmployerController::class, 'create']);

Route::get('/NewProduct', [App\Http\Controllers\ProductController::class, 'index'])->name('NewProduct');

Route::post('NewProduct', [App\Http\Controllers\ProductController::class, 'create']);


