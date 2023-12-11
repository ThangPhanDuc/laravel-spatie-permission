<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RoleController;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::redirect('/home', '/admin');

Route::middleware(['auth'])->group(function () {
    Route::get('/admin', function () {
        return view('layouts.admin');
    });

    Route::get('/products', [ProductController::class, 'index'])->name('products.index');
    Route::get('/products/{product}', [ProductController::class, 'show'])->where('product', '[0-9]+')->name('products.show');
    
    Route::get('/filter-and-search-products',  [ProductController::class, 'filterAndSearchProducts'])->name('products.filter-and-search');


    Route::middleware(['role:admin|employee'])->group(function () {

        Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
        Route::post('/products', [ProductController::class, 'store'])->name('products.store');

        Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
        Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update');

        Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
    });

    Route::middleware(['role:admin'])->group(function () {
        Route::get('/manage-roles', [RoleController::class, 'index'])->name('roles.index');
        Route::post('/manage-roles/{user}', [RoleController::class, 'updateRoles'])->name('roles.update');
    });
});


