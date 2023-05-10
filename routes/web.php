<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SupplyController;
use App\Http\Controllers\Admin\TransactionController;
use App\Http\Controllers\Client\OrderController as ClientOrderController;
use App\Http\Controllers\Client\ProductController as ClientProductController;
use App\Http\Controllers\Employee\OrderController as EmployeeOrderController;
use App\Http\Controllers\Employee\SupplyController as EmployeeSupplyController;
use App\Http\Controllers\Employee\TransactionController as EmployeeTransactionController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::middleware('role:admin')->prefix('admin')->as('admin.')->group(function () {
        Route::resource('order', OrderController::class);
        Route::resource('transaction', TransactionController::class);
        Route::resource('category', CategoryController::class);
        Route::resource('products', ProductController::class);
        Route::resource('supply', SupplyController::class);
    });

    Route::middleware('role:employee')->prefix('employee')->as('employee.')->group(function (){
        Route::resource('transaction', EmployeeTransactionController::class)->only([
            'index', 'create', 'update', 'edit', 'store'
        ]);
        Route::resource('supply', EmployeeSupplyController::class)->only([
            'index'
        ]);
        Route::resource('order', EmployeeOrderController::class)->only([
            'index'
        ]);
    });

    Route::middleware('role:client')->prefix('client')->as('client.')->group(function (){
        Route::resource('order', ClientOrderController::class)->only([
            'index', 'create',  'store'
        ]);
        Route::resource('products', ClientProductController::class)->only([
            'index'
        ]);
    });
});


require __DIR__.'/auth.php';
