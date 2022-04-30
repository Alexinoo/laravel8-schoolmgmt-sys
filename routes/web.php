<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Backend\UserController;
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

Route::middleware([
    'auth:sanctum',  config('jetstream.auth_session'),  'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        // return view('dashboard'); //Default
        return view('Admin.dashboard'); //Customized
    })->name('dashboard');
});


Route::get('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');


// User Management

Route::prefix('users')->group(function () {
    Route::get('index', [UserController::class, 'index'])->name('view.users');
    Route::get('create', [UserController::class, 'create'])->name('add.user');
    Route::post('store', [UserController::class, 'store'])->name('store.user');
    Route::get('edit/{id}', [UserController::class, 'edit'])->name('edit.user');
    Route::post('update/{id}', [UserController::class, 'update'])->name('update.user');
    Route::get('delete/{id}', [UserController::class, 'destroy'])->name('delete.user');
});
