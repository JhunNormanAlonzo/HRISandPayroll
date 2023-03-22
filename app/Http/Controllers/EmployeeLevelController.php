<?php

namespace App\Http\Controllers;

use App\Imports\EmployeeLevelImport;
use App\Imports\LocationImport;
use App\Models\EmployeeLevel;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class EmployeeLevelController extends Controller
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
    public function show(EmployeeLevel $employeeLevel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(EmployeeLevel $employeeLevel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, EmployeeLevel $employeeLevel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EmployeeLevel $employeeLevel)
    {
        //
    }

    public function import_view(){
        return view('employee_level.import');
    }

    public function import(Request $request){
        Excel::import(new EmployeeLevelImport(), $request->file);
        return redirect()->back()->with('message', 'Imported successfully!');
    }
}
