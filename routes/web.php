<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\Setup\FeeAmountController;
use App\Http\Controllers\Backend\Setup\FeeCategoryController;
use App\Http\Controllers\Backend\Setup\StudentClassController;
use App\Http\Controllers\Backend\Setup\StudentGroupController;
use App\Http\Controllers\Backend\Setup\StudentShiftController;
use App\Http\Controllers\Backend\Setup\StudentYearController;
use App\Http\Controllers\Backend\UserController;
use App\Models\FeeAmount;
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


    // Student Shift
    Route::get('student-shift/index', [StudentShiftController::class, 'index'])->name('student_shift.index');
    Route::get('student-shift/create', [StudentShiftController::class, 'create'])->name('student_shift.create');
    Route::post('student-shift/store', [StudentShiftController::class, 'store'])->name('student_shift.store');
    Route::get('student-shift/edit/{id}', [StudentShiftController::class, 'edit'])->name('student_shift.edit');
    Route::post('student-shift/update/{id}', [StudentShiftController::class, 'update'])->name('student_shift.update');
    Route::get('student-shift/delete/{id}', [StudentShiftController::class, 'destroy'])->name('student_shift.delete');


    // Fee Category
    Route::get('fee-category/index', [FeeCategoryController::class, 'index'])->name('fee_category.index');
    Route::get('fee-category/create', [FeeCategoryController::class, 'create'])->name('fee_category.create');
    Route::post('fee-category/store', [FeeCategoryController::class, 'store'])->name('fee_category.store');
    Route::get('fee-category/edit/{id}', [FeeCategoryController::class, 'edit'])->name('fee_category.edit');
    Route::post('fee-category/update/{id}', [FeeCategoryController::class, 'update'])->name('fee_category.update');
    Route::get('fee-category/delete/{id}', [FeeCategoryController::class, 'destroy'])->name('fee_category.delete');


    // Fee Category Amount
    Route::get('fee-category-amount/index', [FeeAmountController::class, 'index'])->name('fee_category_amount.index');
    Route::get('fee-category-amount/create', [FeeAmountController::class, 'create'])->name('fee_category_amount.create');
    Route::post('fee-category-amount/store', [FeeAmountController::class, 'store'])->name('fee_category_amount.store');
    Route::get('fee-category-amount/edit/{fee_category_id}', [FeeAmountController::class, 'edit'])->name('fee_category_amount.edit');
    Route::post('fee-category-amount/update/{fee_category_id}', [FeeAmountController::class, 'update'])->name('fee_category_amount.update');
    Route::get('fee-category-amount/delete/{id}', [FeeAmountController::class, 'destroy'])->name('fee_category_amount.delete');
});
