<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\ClientController;
use \App\Http\Controllers\HomeController;
use \App\Http\Controllers\OrderController;

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

//GET

Route::get('/add-client', [ClientController::class, 'create'])->name('add-client');

Route::get('/view-clients', [ClientController::class, 'index'])->name('view-clients');

Route::get('/view-orders', [OrderController::class, 'index'])->name('view-orders');

Route::get('/view-clients/client/{client}', [ClientController::class, 'show'])->name('show-client');

Route::get('/orders/create/client/{client}', [OrderController::class, 'create'])->name('create-order');

Route::get('/view-orders/order/{order}', [OrderController::class, 'show'])->name('show-order');

Route::get('/view-orders/order/{order}/edit', [OrderController::class, 'edit'])->name('edit-order');

//POST

Route::post('/add-client', [ClientController::class, 'store'])->name('save-client');

Route::post('/orders/create/client/{client}', [OrderController::class, 'store'])->name('save-order');

//PUT

Route::put('/view-orders/order/{order}/edit', [OrderController::class, 'update'])->name('update-order');


Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
