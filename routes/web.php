<?php

use Illuminate\Support\Facades\Auth;
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
    return view('auth.login');
});

    // Route::get('/', [App\Http\Controllers\CategoryController::class, 'index'])->name('home');
    // Route::post('/store', [App\Http\Controllers\CategoryController::class, 'store'])->name('store');
    // Route::get('/fetchall', [App\Http\Controllers\CategoryController::class, 'fetchAll'])->name('fetchAll');
    // Route::delete('/delete', [App\Http\Controllers\CategoryController::class, 'delete'])->name('delete');
    // Route::get('/edit', [App\Http\Controllers\CategoryController::class, 'edit'])->name('edit');
    // Route::post('/update', [App\Http\Controllers\CategoryController::class, 'update'])->name('update');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'user'])->name('home');

Route::prefix('admin')->middleware(['auth', 'Admin'])->group(function () {
	Route::get('dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');

	Route::get('admin/profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('admin/profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::put('admin/profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);

    //Category
    Route::get('/admin/category', [App\Http\Controllers\CategoryController::class, 'index'])->name('list');
    Route::post('/admin/category/store', [App\Http\Controllers\CategoryController::class, 'store'])->name('store');
    Route::get('/admin/category/fetchall', [App\Http\Controllers\CategoryController::class, 'fetchAll'])->name('fetchAll');
    Route::delete('/admin/category/delete', [App\Http\Controllers\CategoryController::class, 'delete'])->name('delete');
    Route::get('/admin/category/edit', [App\Http\Controllers\CategoryController::class, 'edit'])->name('edit');
    Route::post('/admin/category/update', [App\Http\Controllers\CategoryController::class, 'update'])->name('update');
    Route::get('/admin/category/status', [App\Http\Controllers\CategoryController::class, 'status'])->name('status');

    //Inventory
    Route::get('/admin/inventory', [App\Http\Controllers\InventoryController::class, 'index'])->name('inventory-list');
    Route::post('/admin/inventory/store', [App\Http\Controllers\InventoryController::class, 'store'])->name('inventory-store');
    Route::get('/admin/inventory/fetchall', [App\Http\Controllers\InventoryController::class, 'fetchAll'])->name('inventory-fetchAll');
    Route::delete('/admin/inventory/delete', [App\Http\Controllers\InventoryController::class, 'delete'])->name('inventory-delete');
    Route::get('/admin/inventory/edit', [App\Http\Controllers\InventoryController::class, 'edit'])->name('inventory-edit');
    Route::post('/admin/inventory/update', [App\Http\Controllers\InventoryController::class, 'update'])->name('inventory-update');
    Route::get('/admin/inventory/status', [App\Http\Controllers\InventoryController::class, 'status'])->name('inventory-status');


    //Customer
    Route::get('/admin/customer', [App\Http\Controllers\CustomerController::class, 'index'])->name('customer-list');
    Route::post('/admin/customer/store', [App\Http\Controllers\CustomerController::class, 'store'])->name('customer-store');
    Route::get('/admin/customer/fetchall', [App\Http\Controllers\CustomerController::class, 'fetchAll'])->name('customer-fetchAll');
    Route::delete('/admin/customer/delete', [App\Http\Controllers\CustomerController::class, 'delete'])->name('customer-delete');
    Route::get('/admin/customer/edit', [App\Http\Controllers\CustomerController::class, 'edit'])->name('customer-edit');
    Route::post('/admin/customer/update', [App\Http\Controllers\CustomerController::class, 'update'])->name('customer-update');
    Route::get('/admin/customer/status', [App\Http\Controllers\CustomerController::class, 'status'])->name('customer-status');


    //Deliveryman
    Route::get('/admin/deliveryman', [App\Http\Controllers\DeliveryManController::class, 'index'])->name('deliveryman-list');
    Route::post('/admin/deliveryman/store', [App\Http\Controllers\DeliveryManController::class, 'store'])->name('deliveryman-store');
    Route::get('/admin/deliveryman/fetchall', [App\Http\Controllers\DeliveryManController::class, 'fetchAll'])->name('deliveryman-fetchAll');
    Route::delete('/admin/deliveryman/delete', [App\Http\Controllers\DeliveryManController::class, 'delete'])->name('deliveryman-delete');
    Route::get('/admin/deliveryman/edit', [App\Http\Controllers\DeliveryManController::class, 'edit'])->name('deliveryman-edit');
    Route::post('/admin/deliveryman/update', [App\Http\Controllers\DeliveryManController::class, 'update'])->name('deliveryman-update');
    Route::get('/admin/deliveryman/status', [App\Http\Controllers\DeliveryManController::class, 'status'])->name('deliveryman-status');

    //Orders
    Route::get('/admin/orders', [App\Http\Controllers\OrdersController::class, 'index'])->name('orders-list');
    Route::post('/admin/orders/store', [App\Http\Controllers\OrdersController::class, 'store'])->name('orders-store');
    Route::get('/admin/orders/fetchall', [App\Http\Controllers\OrdersController::class, 'fetchAll'])->name('orders-fetchAll');
    Route::delete('/admin/orders/delete', [App\Http\Controllers\OrdersController::class, 'delete'])->name('orders-delete');
    Route::get('/admin/orders/edit', [App\Http\Controllers\OrdersController::class, 'edit'])->name('orders-edit');
    Route::post('/admin/orders/update', [App\Http\Controllers\OrdersController::class, 'update'])->name('orders-update');


    //Report
    Route::get('/admin/sales-report', [App\Http\Controllers\ReportController::class, 'index'])->name('sales-report-list');
    // Route::post('/admin/sales-report/store', [App\Http\Controllers\ReportController::class, 'store'])->name('sales-report-store');
    Route::get('/admin/sales-report/fetchall', [App\Http\Controllers\ReportController::class, 'fetchAll'])->name('sales-report-fetchAll');
    // Route::delete('/admin/sales-report/delete', [App\Http\Controllers\ReportController::class, 'delete'])->name('sales-report-delete');
    // Route::get('/admin/sales-report/edit', [App\Http\Controllers\ReportController::class, 'edit'])->name('sales-report-edit');
    // Route::post('/admin/sales-report/update', [App\Http\Controllers\ReportController::class, 'update'])->name('sales-report-update');
    // Route::get('/admin/sales-report/status', [App\Http\Controllers\ReportController::class, 'status'])->name('sales-report-status');
});

// Route::group(['middleware' => 'auth'], function () {
// 	Route::get('dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');

// 	Route::get('admin/profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
// 	Route::put('admin/profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
// 	Route::put('admin/profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);

//     //Category
//     Route::get('/admin/category', [App\Http\Controllers\CategoryController::class, 'index'])->name('list');
//     Route::post('/admin/category/store', [App\Http\Controllers\CategoryController::class, 'store'])->name('store');
//     Route::get('/admin/category/fetchall', [App\Http\Controllers\CategoryController::class, 'fetchAll'])->name('fetchAll');
//     Route::delete('/admin/category/delete', [App\Http\Controllers\CategoryController::class, 'delete'])->name('delete');
//     Route::get('/admin/category/edit', [App\Http\Controllers\CategoryController::class, 'edit'])->name('edit');
//     Route::post('/admin/category/update', [App\Http\Controllers\CategoryController::class, 'update'])->name('update');
//     Route::get('/admin/category/status', [App\Http\Controllers\CategoryController::class, 'status'])->name('status');

//     //Inventory
//     Route::get('/admin/inventory', [App\Http\Controllers\InventoryController::class, 'index'])->name('inventory-list');
//     Route::post('/admin/inventory/store', [App\Http\Controllers\InventoryController::class, 'store'])->name('inventory-store');
//     Route::get('/admin/inventory/fetchall', [App\Http\Controllers\InventoryController::class, 'fetchAll'])->name('inventory-fetchAll');
//     Route::delete('/admin/inventory/delete', [App\Http\Controllers\InventoryController::class, 'delete'])->name('inventory-delete');
//     Route::get('/admin/inventory/edit', [App\Http\Controllers\InventoryController::class, 'edit'])->name('inventory-edit');
//     Route::post('/admin/inventory/update', [App\Http\Controllers\InventoryController::class, 'update'])->name('inventory-update');
//     Route::get('/admin/inventory/status', [App\Http\Controllers\InventoryController::class, 'status'])->name('inventory-status');


//     //Customer
//     Route::get('/admin/customer', [App\Http\Controllers\CustomerController::class, 'index'])->name('customer-list');
//     Route::post('/admin/customer/store', [App\Http\Controllers\CustomerController::class, 'store'])->name('customer-store');
//     Route::get('/admin/customer/fetchall', [App\Http\Controllers\CustomerController::class, 'fetchAll'])->name('customer-fetchAll');
//     Route::delete('/admin/customer/delete', [App\Http\Controllers\CustomerController::class, 'delete'])->name('customer-delete');
//     Route::get('/admin/customer/edit', [App\Http\Controllers\CustomerController::class, 'edit'])->name('customer-edit');
//     Route::post('/admin/customer/update', [App\Http\Controllers\CustomerController::class, 'update'])->name('customer-update');
//     Route::get('/admin/customer/status', [App\Http\Controllers\CustomerController::class, 'status'])->name('customer-status');


//     //Deliveryman
//     Route::get('/admin/deliveryman', [App\Http\Controllers\DeliveryManController::class, 'index'])->name('deliveryman-list');
//     Route::post('/admin/deliveryman/store', [App\Http\Controllers\DeliveryManController::class, 'store'])->name('deliveryman-store');
//     Route::get('/admin/deliveryman/fetchall', [App\Http\Controllers\DeliveryManController::class, 'fetchAll'])->name('deliveryman-fetchAll');
//     Route::delete('/admin/deliveryman/delete', [App\Http\Controllers\DeliveryManController::class, 'delete'])->name('deliveryman-delete');
//     Route::get('/admin/deliveryman/edit', [App\Http\Controllers\DeliveryManController::class, 'edit'])->name('deliveryman-edit');
//     Route::post('/admin/deliveryman/update', [App\Http\Controllers\DeliveryManController::class, 'update'])->name('deliveryman-update');
//     Route::get('/admin/deliveryman/status', [App\Http\Controllers\DeliveryManController::class, 'status'])->name('deliveryman-status');

//     //Orders
//     Route::get('/admin/orders', [App\Http\Controllers\OrdersController::class, 'index'])->name('orders-list');
//     Route::post('/admin/orders/store', [App\Http\Controllers\OrdersController::class, 'store'])->name('orders-store');
//     Route::get('/admin/orders/fetchall', [App\Http\Controllers\OrdersController::class, 'fetchAll'])->name('orders-fetchAll');
//     Route::delete('/admin/orders/delete', [App\Http\Controllers\OrdersController::class, 'delete'])->name('orders-delete');
//     Route::get('/admin/orders/edit', [App\Http\Controllers\OrdersController::class, 'edit'])->name('orders-edit');
//     Route::post('/admin/orders/update', [App\Http\Controllers\OrdersController::class, 'update'])->name('orders-update');


//     //Report
//     Route::get('/admin/sales-report', [App\Http\Controllers\ReportController::class, 'index'])->name('sales-report-list');
//     // Route::post('/admin/sales-report/store', [App\Http\Controllers\ReportController::class, 'store'])->name('sales-report-store');
//     Route::get('/admin/sales-report/fetchall', [App\Http\Controllers\ReportController::class, 'fetchAll'])->name('sales-report-fetchAll');
//     // Route::delete('/admin/sales-report/delete', [App\Http\Controllers\ReportController::class, 'delete'])->name('sales-report-delete');
//     // Route::get('/admin/sales-report/edit', [App\Http\Controllers\ReportController::class, 'edit'])->name('sales-report-edit');
//     // Route::post('/admin/sales-report/update', [App\Http\Controllers\ReportController::class, 'update'])->name('sales-report-update');
//     // Route::get('/admin/sales-report/status', [App\Http\Controllers\ReportController::class, 'status'])->name('sales-report-status');
// });


