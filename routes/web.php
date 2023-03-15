<?php

use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\EmployeeLeaveController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\SectionController;
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






Route::get('/import_ledger', [\App\Http\Controllers\PLedgerController::class, 'index'])->name('p_ledger.index');
Route::post('/import_ledger', [\App\Http\Controllers\PLedgerController::class, 'importData'])->name('p_ledger.import');

Route::get('/employee_number', [\App\Http\Controllers\EmployeeController::class, 'employee_number_index'])->name('employee.number.index');
Route::post('/employee_number', [\App\Http\Controllers\EmployeeController::class, 'updateEmpNumber'])->name('employee.number.import');
Route::get('/tester', [\App\Http\Controllers\EmployeeController::class, 'manipulate_emp_number']);

Route::get('/', function (){
   return redirect()->route('employee_leaves.index');
});

Route::resource('employee_leaves', EmployeeLeaveController::class);
Route::resource('departments', DepartmentController::class);
Route::resource('locations', LocationController::class);
Route::resource('divisions', SectionController::class);
Route::resource('wages', WageController::class);
