<?php

use App\Http\Controllers\DeductionController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\EmployeeLeaveController;
use App\Http\Controllers\EmployeeLevelController;
use App\Http\Controllers\LoanAccountController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\PeriodController;
use App\Http\Controllers\PhTableController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\SpdateController;
use App\Http\Controllers\SssTableController;
use App\Http\Controllers\WageController;
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


Auth::routes();



Route::get('/', function (){
   return view('auth.login');
});


Route::get('/import_ledger', [\App\Http\Controllers\PLedgerController::class, 'index'])->name('p_ledger.index');
Route::post('/import_ledger', [\App\Http\Controllers\PLedgerController::class, 'importData'])->name('p_ledger.import');

Route::get('/employee_number', [EmployeeController::class, 'employee_number_index'])->name('employee.number.index');
Route::post('/employee_number', [EmployeeController::class, 'updateEmpNumber'])->name('employee.number.import');
Route::get('/tester', [EmployeeController::class, 'manipulate_emp_number']);

Route::get('/export/employee-details', [EmployeeController::class, 'exportEmployeeDetails']);

//import location
Route::get('employee_import', [EmployeeController::class, 'import_view'])->name('employee.import_view');
Route::post('employee_import', [EmployeeController::class, 'import'])->name('employee.import');

Route::get('employee_level_import', [EmployeeLevelController::class, 'import_view'])->name('employee_levels.import_view');
Route::post('employee_level_import', [EmployeeLevelController::class, 'import'])->name('employee_levels.import');

Route::get('location_import', [LocationController::class, 'import_view'])->name('location.import_view');
Route::post('location_import', [LocationController::class, 'import'])->name('location.import');


Route::resource('employee_leaves', EmployeeLeaveController::class);
Route::resource('departments', DepartmentController::class);
Route::resource('locations', LocationController::class);
Route::resource('divisions', SectionController::class);
Route::resource('wages', WageController::class);
Route::resource('deductions', DeductionController::class);
Route::resource('ssstables', SssTableController::class);
Route::resource('phtables', PhTableController::class);
Route::resource('spdates', SpdateController::class);
Route::resource('periods', PeriodController::class);
Route::resource('loan_accounts', LoanAccountController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
