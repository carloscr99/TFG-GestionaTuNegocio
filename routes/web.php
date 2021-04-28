<?php

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
    
})->name('welcome');

// Route::resource('NewEmployer', 'EmployerController');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/Employers', [App\Http\Controllers\EmployerController::class, 'index'])->name('employers');

Route::get('/NewEmployer', [App\Http\Controllers\EmployerController::class, 'newEmployer'])->name('NewEmployer');

Route::post('NewEmployer', [App\Http\Controllers\EmployerController::class, 'create']);

Route::get('/EmployerEdit/{employer?}', [App\Http\Controllers\EmployerController::class, 'openEdit'])->name('EmployerEdit');

Route::post('/EmployerEdit/{employer?}', [App\Http\Controllers\EmployerController::class, 'edit']);

Route::delete('/EmployerDelete/{employer?}', [App\Http\Controllers\EmployerController::class, 'delete']);

Route::get('/NewProduct', [App\Http\Controllers\ProductController::class, 'index'])->name('NewProduct');

Route::post('NewProduct', [App\Http\Controllers\ProductController::class, 'create']);

Route::get('/ProductEdit/{product?}', [App\Http\Controllers\ProductController::class, 'openEdit'])->name('ProductEdit');

Route::post('/ProductEdit/{product?}', [App\Http\Controllers\ProductController::class, 'edit']);

Route::delete('/ProductDelete/{product?}', [App\Http\Controllers\ProductController::class, 'delete']);

Route::get('/shops', [App\Http\Controllers\ShopController::class, 'index'])->name('shops');

Route::get('/shop/{cif?}', [App\Http\Controllers\ShopController::class, 'openEdit'])->name('shop');

Route::post('/shop/{cif?}', [App\Http\Controllers\ShopController::class, 'edit']);

Route::get('/shopEmail/{cif?}', [App\Http\Controllers\ShopController::class, 'sendEmail'])->name('sendMailDeleteShop');

Route::delete('/shopDelete/{cif?}', [App\Http\Controllers\ShopController::class, 'delete']);

Route::get('/resetPassword', [App\Http\Controllers\PasswordController::class, 'index'])->name('newPassword');

 Route::post('resetPassword', [App\Http\Controllers\PasswordController::class, 'resetPassword'])->name('resetPassword');


