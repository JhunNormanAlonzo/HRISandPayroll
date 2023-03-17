<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\EmployeeLeave;
use App\Models\Scopes\EmployeeScope;
use App\Models\Scopes\MyGlobalScope;
use App\Models\WdRef;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class EmployeeLeaveController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = Employee::withoutGlobalScope(EmployeeScope::class)->get();
        $leaves = WdRef::where('is_lv', 1)->get();

        return view('employee.leave.index', compact(['employees', 'leaves']));
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
        $this->validate($request, [
            'lv_date' => 'required',
            'emp_ctrl' => 'required',
            'wd_id' => 'required',
            'reason' => 'required',
            'lv_from' => 'required',
            'lv_to' => 'required',
            'lv_qty' => 'required',
            'lv_days' => 'required',
        ]);
        $w_pay = $request->has('w_pay') ? 1 : 0;

        $new_data = [
            'lv_ctrl' => "_".strtoupper(Str::random(9)),
            'date_filed' => now()->format('Y-m-d'),
            'w_pay' => $w_pay
        ];

        $request->merge($new_data);

        $input = $request->all();

        $input['emp_ctrl'] = Employee::where('emp_name', $input['emp_ctrl'])->pluck('emp_ctrl')->first();


        EmployeeLeave::create($input);

        return redirect()->back()->with('message', 'Leave Applied Successfully!');


//        return redirect()
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
}
