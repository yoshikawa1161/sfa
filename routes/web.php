<?php

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

Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', [App\Http\Controllers\CustomerController::class, 'home'])->name('home');
    Route::get('/customers', [App\Http\Controllers\CustomerController::class, 'index'])->name('customers.index');
    Route::get('/customers/create', [App\Http\Controllers\CustomerController::class, 'create'])->name('customers.create');
    Route::post('/customers', [App\Http\Controllers\CustomerController::class, 'store'])->name('customers.store');
    Route::get('/customers/{customer}', [App\Http\Controllers\CustomerController::class, 'show'])->name('customers.show');
    Route::get('/customers/{customer}/edit', [App\Http\Controllers\CustomerController::class, 'edit'])->name('customers.edit');
    Route::patch('/customers/{customer}', [App\Http\Controllers\CustomerController::class, 'update'])->name('customers.update');
    Route::delete('/customers/{customer}', [App\Http\Controllers\CustomerController::class, 'destroy'])->name('customers.destroy');


    Route::get('/matters', [App\Http\Controllers\MatterController::class, 'index'])->name('matters.index');
    Route::get('/matters/create_first', [App\Http\Controllers\MatterController::class, 'create_first'])->name('matters.create_first');
    Route::get('/matters/{customer}/create', [App\Http\Controllers\MatterController::class, 'create'])->name('matters.create');
    Route::get('/matters/customer_select', [App\Http\Controllers\MatterController::class, 'customer_select'])->name('matters.customer_select');
    Route::post('/matters', [App\Http\Controllers\MatterController::class, 'store'])->name('matters.store');
});
