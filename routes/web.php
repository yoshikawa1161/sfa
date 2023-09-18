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
    Route::get('/', [App\Http\Controllers\CustomerController::class, 'home'])->name('home');
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
    Route::get('/matters/{matter}/edit', [App\Http\Controllers\MatterController::class, 'edit'])->name('matters.edit');
    Route::patch('/matters/{matter}', [App\Http\Controllers\MatterController::class, 'update'])->name('matters.update');
    Route::delete('/matters/{matter}', [App\Http\Controllers\MatterController::class, 'destroy'])->name('matters.destroy');
    Route::get('/matters/{matter}/order_status', [App\Http\Controllers\MatterController::class, 'order_status'])->name('matters.order_status');
    Route::patch('/matters/{matter}/order_date', [App\Http\Controllers\MatterController::class, 'order_date'])->name('matters.order_date');
    Route::get('/matters/order_list', [App\Http\Controllers\MatterController::class, 'order_list'])->name('matters.order_list');
    Route::get('/matters/{matter}/delivery_status', [App\Http\Controllers\MatterController::class, 'delivery_status'])->name('matters.delivery_status');
    Route::patch('/matters/{matter}/delivery_date', [App\Http\Controllers\MatterController::class, 'delivery_date'])->name('matters.delivery_date');
    Route::get('/matters/delivery_list', [App\Http\Controllers\MatterController::class, 'delivery_list'])->name('matters.delivery_list');
    Route::get('/matters/delivery/{matter}', [App\Http\Controllers\MatterController::class, 'delivery'])->name('matters.delivery');
    Route::patch('/matters/{matter}/delivery_cancel', [App\Http\Controllers\MatterController::class, 'delivery_cancel'])->name('matters.delivery_cancel');

    Route::get('/reports', [App\Http\Controllers\ReportController::class, 'index'])->name('reports.index');
    Route::get('/reports/matter_select', [App\Http\Controllers\ReportController::class, 'matter_select'])->name('reports.matter_select');
    Route::get('/reports/{matter}/create', [App\Http\Controllers\ReportController::class, 'create'])->name('reports.create');
    Route::patch('/reports/{matter}/', [App\Http\Controllers\ReportController::class, 'store'])->name('reports.store');
    Route::get('/setReports', [App\Http\Controllers\ReportController::class, 'setReports'])->name('reports.setReports');
    Route::get('/reports/edit/{report}', [App\Http\Controllers\ReportController::class, 'edit'])->name('reports.edit');
    Route::patch('/reports/{report}/{matter}', [App\Http\Controllers\ReportController::class, 'update'])->name('reports.update');
    Route::delete('/reports/{report}', [App\Http\Controllers\ReportController::class, 'destroy'])->name('reports.destroy');
    Route::get('/reports/{matter}', [App\Http\Controllers\ReportController::class, 'reports_list'])->name('reports.list');

    Route::get('/delivery_map', [App\Http\Controllers\MapController::class, 'delivery_map'])->name('maps.delivery_map');
    Route::post('/set_delivery', [App\Http\Controllers\MapController::class, 'set_delivery'])->name('maps.set_delivery');
    Route::get('/approach_map', [App\Http\Controllers\MapController::class, 'approach_map'])->name('maps.approach_map');
    Route::post('/set_approach', [App\Http\Controllers\MapController::class, 'set_approach'])->name('maps.set_approach');
    Route::get('/meeting_map', [App\Http\Controllers\MapController::class, 'meeting_map'])->name('maps.meeting_map');
    Route::post('/set_meeting', [App\Http\Controllers\MapController::class, 'set_meeting'])->name('maps.set_meeting');
    Route::get('/demo_map', [App\Http\Controllers\MapController::class, 'demo_map'])->name('maps.demo_map');
    Route::post('/set_demo', [App\Http\Controllers\MapController::class, 'set_demo'])->name('maps.set_demo');
    Route::get('/final_meeting_map', [App\Http\Controllers\MapController::class, 'final_meeting_map'])->name('maps.final_meeting_map');
    Route::post('/set_final_meeting', [App\Http\Controllers\MapController::class, 'set_final_meeting'])->name('maps.set_final_meeting');
});
Route::get('/guest-login', [App\Http\Controllers\CustomerController::class, 'guest'])->name('guestlogin');
