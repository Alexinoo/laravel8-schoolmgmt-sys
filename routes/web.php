<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\Setup\StudentClassController;
use App\Http\Controllers\Backend\Setup\StudentGroupController;
use App\Http\Controllers\Backend\Setup\StudentYearController;
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

// Profile Management
Route::prefix('profile')->group(function () {
    Route::get('index', [ProfileController::class, 'index'])->name('view.profile');
    Route::get('edit', [ProfileController::class, 'edit'])->name('edit.profile');
    Route::post('store', [ProfileController::class, 'store'])->name('store.profile');

    // Password
    Route::get('password/view', [ProfileController::class, 'view_password'])->name('view.password');
    Route::post('password/update', [ProfileController::class, 'update_password'])->name('update.password');
});

// Setups Management
Route::prefix('setups')->group(function () {

    // Student Class
    Route::get('student-class/index', [StudentClassController::class, 'index'])->name('student_class.index');
    Route::get('student-class/create', [StudentClassController::class, 'create'])->name('student_class.create');
    Route::post('student-class/store', [StudentClassController::class, 'store'])->name('student_class.store');
    Route::get('student-class/edit/{id}', [StudentClassController::class, 'edit'])->name('student_class.edit');
    Route::post('student-class/update/{id}', [StudentClassController::class, 'update'])->name('student_class.update');
    Route::get('student-class/delete/{id}', [StudentClassController::class, 'destroy'])->name('student_class.delete');

    // Student Year
    Route::get('student-year/index', [StudentYearController::class, 'index'])->name('student_year.index');
    Route::get('student-year/create', [StudentYearController::class, 'create'])->name('student_year.create');
    Route::post('student-year/store', [StudentYearController::class, 'store'])->name('student_year.store');
    Route::get('student-year/edit/{id}', [StudentYearController::class, 'edit'])->name('student_year.edit');
    Route::post('student-year/update/{id}', [StudentYearController::class, 'update'])->name('student_year.update');
    Route::get('student-year/delete/{id}', [StudentYearController::class, 'destroy'])->name('student_year.delete');


    // Student Group
    Route::get('student-group/index', [StudentGroupController::class, 'index'])->name('student_group.index');
    Route::get('student-group/create', [StudentGroupController::class, 'create'])->name('student_group.create');
    Route::post('student-group/store', [StudentGroupController::class, 'store'])->name('student_group.store');
    Route::get('student-group/edit/{id}', [StudentGroupController::class, 'edit'])->name('student_group.edit');
    Route::post('student-group/update/{id}', [StudentGroupController::class, 'update'])->name('student_group.update');
    Route::get('student-group/delete/{id}', [StudentGroupController::class, 'destroy'])->name('student_group.delete');
});
