<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\SalesmanController;
use App\Http\Controllers\CustomersController;

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

Route::get('/', [HomeController::class, 'index'])->name('home');

// Customers
Route::resource('/customers', CustomersController::class)->except(['show', 'create', 'edit']);

// Salesman
Route::get('/salesman', [SalesmanController::class, 'index'])->name('salesman');

// Orders
Route::get('/orders', [OrdersController::class, 'index'])->name('orders');
