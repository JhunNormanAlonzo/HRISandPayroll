<?php

namespace App\Http\Controllers;

use App\Exports\EmployeeDetailsExport;
use App\Imports\EmpNumberImport;
use App\Imports\PLedgerImport;
use App\Models\Employee;
use App\Models\ImportEmpNum;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function employee_number_index(){
        return view('employee.employee_number_import');
    }

    public function updateEmpNumber(){
        $employee = Employee::all();

        foreach ($employee as $emp){
            $check = ImportEmpNum::where('emp_name', $emp->emp_name);
            if ($check->exists()){
               $new = Employee::where('emp_name', $check->pluck('emp_name')->first());
               $emp_ctrl = $check->pluck('emp_number')->first();
               $new->update([
                   'emp_number' => $emp_ctrl
               ]);
            }
        }
    }

    public function manipulate_emp_number(){

        $employee = Employee::all();
        foreach ($employee as $emp){
            $num = $emp->pluck('emp_number')->first();
            $num_with_zero = str_pad($num, 8, '0', STR_PAD_LEFT);

            $new = Employee::where('emp_name', $emp->pluck('emp_name')->first());
            $new->update([
                'emp_number' => $num_with_zero
            ]);
        }
    }

    public function exportEmployeeDetails(){
        $date = Carbon::now()->format('Y-m-d');
        $report_name = "employee_details_".$date.".xlsx";
        return Excel::download(new EmployeeDetailsExport(), $report_name);
    }
}
