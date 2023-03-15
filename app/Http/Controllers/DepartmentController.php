<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $departments = Department::all();
        return view('department.index', compact('departments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('department.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $emp_dept = "_".strtoupper(Str::random(9));
        $this->validate($request, [

            'dept_code' => 'required',
            'dept_desc' => 'required'
        ]);


        $request->merge([
            'emp_dept' => $emp_dept
        ]);
        Department::create($request->all());

        return redirect()->back()->with('message', 'Department Created Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Department $department)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Department $department)
    {
        return view('department.edit', compact('department'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Department $department)
    {
        $request->dept_code = strtoupper($request->dept_code);
        $this->validate($request, [
            'dept_code' => 'required',
            'dept_desc' => 'required',
        ]);

        $data = [
            'dept_code' => strtoupper($request->dept_code),
            'dept_desc' => $request->dept_desc
        ];


        $department->update($data);

        return redirect()->route('departments.index')->with('message', 'Department Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Department $department)
    {
        $department->delete();
        return redirect()->back()->with('message', 'Department Deleted Successfully!');
    }
}
