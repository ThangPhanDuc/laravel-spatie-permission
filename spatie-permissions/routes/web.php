<?php

use Illuminate\Support\Facades\Route;
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

Route::get('/posts', [App\Http\Controllers\PostsController::class, 'index'])->name('posts.index');

Route::middleware(['auth'])->group(function () {
    Route::get('/my-roles', [App\Http\Controllers\RoleController::class, 'myRoles'])->name('my.roles');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/manage-posts', [App\Http\Controllers\PostManagementController::class, 'index'])->name('manage.posts');
    Route::get('/manage-posts/{post}/edit', [App\Http\Controllers\PostManagementController::class, 'edit'])->name('manage.posts.edit')->middleware('can:edit articles,post');
    Route::put('/manage-posts/{post}/update-status', [App\Http\Controllers\PostManagementController::class, 'updateStatus'])->name('manage.posts.updateStatus')->middleware('can:publish articles,post');
});

Route::middleware(['auth', 'role:Super-Admin'])->group(function () {
    Route::get('/manage-roles', [App\Http\Controllers\RoleController::class, 'index'])->name('manage.roles');
    Route::post('/manage-roles/{user}', [App\Http\Controllers\RoleController::class, 'update'])->name('manage.roles.update');
});
