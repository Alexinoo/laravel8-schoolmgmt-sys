<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Backend\Account\Other_costController;
use App\Http\Controllers\Backend\Account\Salary_accountController;
use App\Http\Controllers\Backend\Account\Student_feeController;
use App\Http\Controllers\Backend\DefaultController;
use App\Http\Controllers\Backend\Employee\EmployeeRegistrationController;
use App\Http\Controllers\Backend\Employee\EmployeeSalaryController;
use App\Http\Controllers\Backend\Employee\EmployeeLeaveController;
use App\Http\Controllers\Backend\Employee\EmployeeAttendanceController;
use App\Http\Controllers\Backend\Employee\MonthlySalaryController;
use App\Http\Controllers\Backend\Mark\GradeController;
use App\Http\Controllers\Backend\Mark\MarkController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\Report\MarksheetController;
use App\Http\Controllers\Backend\Report\ProfitController;
use App\Http\Controllers\Backend\Setup\AssignSubjectController;
use App\Http\Controllers\Backend\Setup\DesignationController;
use App\Http\Controllers\Backend\Setup\ExamTypeController;
use App\Http\Controllers\Backend\Setup\FeeAmountController;
use App\Http\Controllers\Backend\Setup\FeeCategoryController;
use App\Http\Controllers\Backend\Setup\StudentClassController;
use App\Http\Controllers\Backend\Setup\StudentGroupController;
use App\Http\Controllers\Backend\Setup\StudentShiftController;
use App\Http\Controllers\Backend\Setup\StudentYearController;
use App\Http\Controllers\Backend\Setup\SchoolSubjectController;
use App\Http\Controllers\Backend\Student\ExamFeeController;
use App\Http\Controllers\Backend\Student\MonthlyFeeController;
use App\Http\Controllers\Backend\Student\RegistrationFeeController;
use App\Http\Controllers\Backend\Student\StudentRegistrationController;
use App\Http\Controllers\Backend\Student\StudentRollController;
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


// Group Middleware - for all routes - Need to be Authenticated first
Route::group(['middleware' => 'auth'], function () {

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

        Route::get('fee-category-amount/show/{fee_category_id}', [FeeAmountController::class, 'show'])->name('fee_category_amount.show');

        Route::get('fee-category-amount/edit/{fee_category_id}', [FeeAmountController::class, 'edit'])->name('fee_category_amount.edit');
        Route::post('fee-category-amount/update/{fee_category_id}', [FeeAmountController::class, 'update'])->name('fee_category_amount.update');
        Route::get('fee-category-amount/delete/{id}', [FeeAmountController::class, 'destroy'])->name('fee_category_amount.delete');

        // Exam Type
        Route::get('exam-type/index', [ExamTypeController::class, 'index'])->name('exam_type.index');
        Route::get('exam-type/create', [ExamTypeController::class, 'create'])->name('exam_type.create');
        Route::post('exam-type/store', [ExamTypeController::class, 'store'])->name('exam_type.store');
        Route::get('exam-type/edit/{id}', [ExamTypeController::class, 'edit'])->name('exam_type.edit');
        Route::post('exam-type/update/{id}', [ExamTypeController::class, 'update'])->name('exam_type.update');
        Route::get('exam-type/delete/{id}', [ExamTypeController::class, 'destroy'])->name('exam_type.delete');


        // Sudent Subjects
        Route::get('school-subject/index', [SchoolSubjectController::class, 'index'])->name('school_subject.index');
        Route::get('school-subject/create', [SchoolSubjectController::class, 'create'])->name('school_subject.create');
        Route::post('school-subject/store', [SchoolSubjectController::class, 'store'])->name('school_subject.store');
        Route::get('school-subject/edit/{id}', [SchoolSubjectController::class, 'edit'])->name('school_subject.edit');
        Route::post('school-subject/update/{id}', [SchoolSubjectController::class, 'update'])->name('school_subject.update');
        Route::get('school-subject/delete/{id}', [SchoolSubjectController::class, 'destroy'])->name('school_subject.delete');


        // Assign subject
        Route::get('assign-subject/index', [AssignSubjectController::class, 'index'])->name('assign_subject.index');
        Route::get('assign-subject/create', [AssignSubjectController::class, 'create'])->name('assign_subject.create');

        Route::post('assign-subject/store', [AssignSubjectController::class, 'store'])->name('assign_subject.store');

        Route::get('assign-subject/show/{class_id}', [AssignSubjectController::class, 'show'])->name('assign_subject.show');

        Route::get('assign-subject/edit/{class_id}', [AssignSubjectController::class, 'edit'])->name('assign_subject.edit');
        Route::post('assign-subject/update/{class_id}', [AssignSubjectController::class, 'update'])->name('assign_subject.update');
        Route::get('assign-subject/delete/{id}', [AssignSubjectController::class, 'destroy'])->name('assign_subject.delete');

        // Designation
        Route::get('designation/index', [DesignationController::class, 'index'])->name('designation.index');
        Route::get('designation/create', [DesignationController::class, 'create'])->name('designation.create');

        Route::post('designation/store', [DesignationController::class, 'store'])->name('designation.store');

        Route::get('designation/show/{id}', [DesignationController::class, 'show'])->name('designation.show');

        Route::get('designation/edit/{id}', [DesignationController::class, 'edit'])->name('designation.edit');
        Route::post('designation/update/{id}', [DesignationController::class, 'update'])->name('designation.update');
        Route::get('designation/delete/{id}', [DesignationController::class, 'destroy'])->name('designation.delete');
    });


    // Student Registration
    Route::prefix('students')->group(function () {

        Route::get('student-registration/index', [StudentRegistrationController::class, 'index'])->name('student_registration.index');
        Route::get('student-registration/create', [StudentRegistrationController::class, 'create'])->name('student_registration.create');
        Route::post('student-registration/store', [StudentRegistrationController::class, 'store'])->name('student_registration.store');
        Route::get('student-registration/edit/{student_id}', [StudentRegistrationController::class, 'edit'])->name('student_registration.edit');
        Route::post('student-registration/update/{student_id}', [StudentRegistrationController::class, 'update'])->name('student_registration.update');

        // SEARCH BY YEAR CLASS
        Route::get('student-search', [StudentRegistrationController::class, 'search'])->name('search_by_year_class_wise');

        // Student Promotion
        Route::get('student-promotion/promotion/{student_id}', [StudentRegistrationController::class, 'promotion'])->name('student_registration.promotion');

        Route::post('student-promotion/promotion/{student_id}', [StudentRegistrationController::class, 'promotion_update'])->name('student_promotion');

        // Export to pdf
        Route::get('student-pdf/{student_id}', [StudentRegistrationController::class, 'export_pdf'])->name('student_pdf');


        // Generate Roll - 
        Route::get('generate-roll/index', [StudentRollController::class, 'index'])->name('generate_roll.index');
        Route::get('fetch_students', [StudentRollController::class, 'fetchStudents'])->name('fetch_students');
        Route::post('generate-roll/store', [StudentRollController::class, 'store'])->name('generate_roll.store');

        // Registration Fee  
        Route::get('registration-fee/index', [RegistrationFeeController::class, 'index'])->name('registration_fee.index');

        // Get Registration Fee - Class-wise
        Route::get('registration-fee/class-wise', [RegistrationFeeController::class, 'fetchRegFeeClasswise'])->name('fetchRegFeeClasswise');


        Route::get('registration-fee/payslip', [RegistrationFeeController::class, 'RegistrationFeeSlip'])->name('registration_fee.slip');



        // Monthly Fee  
        Route::get('monthly-fee/index', [MonthlyFeeController::class, 'index'])->name('monthly_fee.index');
        // Get Monthly Fee - Class-wise
        Route::get('monthly-fee/class-wise', [MonthlyFeeController::class, 'StudentMonthlyFeeClasswise'])->name('Student-Monthly-Fee-Classwise');

        // Download Monthly Fee
        Route::get('monthly-fee/slip', [MonthlyFeeController::class, 'MonthlyFeeSlip'])->name('monthly_fee.slip');



        // Exam Fee 
        Route::get('exam-fee/index', [ExamFeeController::class, 'index'])->name('exam_fee.index');
        // Get Exam Fee - Class-wise
        Route::get('exam-fee/class-wise', [ExamFeeController::class, 'StudentExamFeeClasswise'])->name('Student-Exam-Fee-Classwise');

        // Download Exam Fee
        Route::get('exam-fee/slip', [ExamFeeController::class, 'ExamFeeSlip'])->name('exam_fee.slip');
    });


    // Employee Registration
    Route::prefix('employees')->group(function () {

        Route::get('employee-registration/index', [EmployeeRegistrationController::class, 'index'])->name('employee_registration.index');
        Route::get('employee-registration/create', [EmployeeRegistrationController::class, 'create'])->name('employee_registration.create');
        Route::post('employee-registration/store', [EmployeeRegistrationController::class, 'store'])->name('employee_registration.store');
        Route::get('employee-registration/edit/{employee_id}', [EmployeeRegistrationController::class, 'edit'])->name('employee_registration.edit');
        Route::post('employee-registration/update/{employee_id}', [EmployeeRegistrationController::class, 'update'])->name('employee_registration.update');

        // Export to pdf
        Route::get('employee-pdf/{employee_id}', [EmployeeRegistrationController::class, 'export_pdf'])->name('employee_pdf');



        // Salary - Review 
        Route::get('employee-salary/index', [EmployeeSalaryController::class, 'index'])->name('employee_salary.index');

        Route::get('employee-salary/increment/{employee_id}', [EmployeeSalaryController::class, 'increment'])->name('employee_salary.increment');

        Route::post('employee-salary/update/{employee_id}', [EmployeeSalaryController::class, 'update'])->name('employee_salary.update');

        Route::get('employee-salary/history/{employee_id}', [EmployeeSalaryController::class, 'salary_history'])->name('employee_salary.history');


        // Employee Leave
        Route::get('employee-leave/index', [EmployeeLeaveController::class, 'index'])->name('employee_leave.index');

        Route::get('employee-leave/create', [EmployeeLeaveController::class, 'create'])->name('employee_leave.create');

        Route::post('employee-leave/store', [EmployeeLeaveController::class, 'store'])->name('employee_leave.store');

        Route::get('employee-leave/edit/{leave_id}', [EmployeeLeaveController::class, 'edit'])->name('employee_leave.edit');

        Route::post('employee-leave/update/{leave_id}', [EmployeeLeaveController::class, 'update'])->name('employee_leave.update');

        Route::get('employee-leave/delete/{leave_id}', [EmployeeLeaveController::class, 'destroy'])->name('employee_leave.delete');


        // Employee Attendance
        Route::get('employee-attendance/index', [EmployeeAttendanceController::class, 'index'])->name('employee_attendance.index');

        Route::get('employee-attendance/create', [EmployeeAttendanceController::class, 'create'])->name('employee_attendance.create');

        Route::post('employee-attendance/store', [EmployeeAttendanceController::class, 'store'])->name('employee_attendance.store');

        Route::get('employee-attendance/edit/{date}', [EmployeeAttendanceController::class, 'edit'])->name('employee_attendance.edit');

        Route::get('employee-attendance/show/{date}', [EmployeeAttendanceController::class, 'show'])->name('employee_attendance.show');

        


        // Monthly Salary
        Route::get('monthly-salary/index', [MonthlySalaryController::class, 'index'])->name('monthly_salary.index');

        // Get Employee Monthly Salary 
        Route::get('monthly-salary/attendance-wise', [MonthlySalaryController::class, 'fetchEmpMonthlySal'])->name('fetchEmpMonthlySal');

        // Get Employee Monthly Salary Payslip
        Route::get('monthly-salary/pay-slip/{emp_id}', [MonthlySalaryController::class, 'EmpMonthlySalPayslip'])->name('monthly_salary_payslip');
    });


        // Marks Management
        Route::prefix('marks')->group(function () {


        // Marks Entry
        Route::get('marks-entry/entries', [MarkController::class, 'entries'])->name('marks_entry.entries');

        Route::post('marks-entry/store', [MarkController::class, 'store'])->name('marks_entry.store');

        Route::get('marks-entry/edit', [MarkController::class, 'edit'])->name('marks_entry.edit');

        // Marks Update entries
        Route::post('marks-entry/update', [MarkController::class, 'update'])->name('marks_entry.update');



        // Marks Grade
        Route::get('marks-grade/index', [GradeController::class, 'index'])->name('marks_grade.index');
        Route::get('marks-grade/create', [GradeController::class, 'create'])->name('marks_grade.create');
        Route::post('marks-grade/store', [GradeController::class, 'store'])->name('marks_grade.store');
        Route::get('marks-grade/edit/{id}', [GradeController::class, 'edit'])->name('marks_grade.edit');
        Route::post('marks-grade/update/{id}', [GradeController::class, 'update'])->name('marks_grade.update');

        });

    // Accounts Management
    Route::prefix('accounts')->group(function () {


        // Accounts - Student Fee
        Route::get('accounts/student-fee', [Student_feeController::class, 'index'])->name('student_fee.index');
        Route::get('accounts/student-fee/create', [Student_feeController::class, 'create'])->name('student_fee.create');
        Route::post('accounts/student-fee/store', [Student_feeController::class, 'store'])->name('student_fee.store');
        Route::get('accounts/student-fee/edit/{id}', [Student_feeController::class, 'edit'])->name('student_fee.edit');


        // Accounts - Employee Salaries
       
        Route::get('salaries/emp-sal', [Salary_accountController::class, 'index'])->name('salaries.index');
        Route::get('salaries/emp-sal/create', [Salary_accountController::class, 'create'])->name('salaries.create');
        Route::post('salaries/emp-sal/store', [Salary_accountController::class, 'store'])->name('salaries.store');
        Route::get('salaries/emp-sal/edit/{id}', [Salary_accountController::class, 'edit'])->name('salaries.edit');

        // Fetch Employee salaries
        Route::get('salaries/fetch-emp-sal', [Salary_accountController::class, 'fetchEmpSalaries'])->name('fetchEmpSalaries');




        // Other costs
        Route::get('other-costs/index', [Other_costController::class, 'index'])->name('other_cost.index');
        Route::get('other-costs/create', [Other_costController::class, 'create'])->name('other_cost.create');
        Route::post('other-costs/store', [Other_costController::class, 'store'])->name('other_cost.store');
        Route::get('other-costs/edit/{id}', [Other_costController::class, 'edit'])->name('other_cost.edit');
        Route::post('other-costs/update/{id}', [Other_costController::class, 'update'])->name('other_cost.update');
        Route::get('other-costs/delete/{id}', [Other_costController::class, 'destroy'])->name('other_cost.delete');
      });



            // REPORTS Module

            // Reports Management
            Route::prefix('reports')->group(function () {

            // Monthly Profit
            Route::get('monthly-profit/index', [ProfitController::class, 'index'])->name('monthly-profit.index');

            Route::get('monthly-profit/datewise', [ProfitController::class, 'GetProfitReportDatewise'])->name('GetProfitReportDatewise');

            Route::get('monthly-profit/pdf', [ProfitController::class, 'export_pdf'])->name('profit_report_pdf');
            });

        // Generate Marksheet Routes
        
        Route::get('generate-marksheet/index', [MarksheetController::class, 'index'])->name('generate_marksheet.index');
        Route::get('generate-marksheet/get', [MarksheetController::class, 'GetMarksheet'])->name('generate_marksheet.get');





        // Default Controller

        Route::get('marks/fetch-subjects', [DefaultController::class, 'fetchSubjects'])->name('fetchSubjects');
        
        Route::get('marks/get-student-marks', [DefaultController::class, 'getStudentMarks'])->name('getStudentMarks');

        Route::get('marks/get-student-marks-for-update', [DefaultController::class, 'getStudentMarksForUpdate'])->name('getStudentMarksForUpdate');


        Route::get('accounts/get-acc-student-fees', [DefaultController::class, 'fetchStudAccFees'])->name('fetchStudAccFees');

    
});

// End Auth middleware 