<?php

namespace App\Http\Controllers;

use App\Models\Deduction;
use App\Models\Employee;
use App\Models\Period;
use App\Models\PLedger;
use App\Models\WdRef;
use Carbon\Carbon;
use Illuminate\Http\Request;

use Illuminate\Support\Str;
use Sabberworm\CSS\Rule\Rule;

class LedgerDeductionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('p_ledger.deduction.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $periods = Period::all();
        $employees = Employee::all();
        $deductions = Deduction::all();
        return view('p_ledger.deduction.create', compact('periods', 'employees', 'deductions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {



        $this->validate($request, [
            'period' => 'required|exists:period,pname',
            'emp_ctrl' => 'required|exists:employee,emp_name',
            'deduction' => 'required|array',
            'deduction.*' => 'required|exists:wd_ref,wd_desc',
            'amount' => 'required|array',
            'amount.*' => 'required|numeric',
        ]);




        // Loop through the arrays and save the values one by one
        for ($i = 0; $i < count($request->deduction); $i++) {

            $ded = $request->deduction[$i];
            $amount = $request->amount[$i];


            $period = Period::where('pname', 'like', '%'.$request->period.'%');
            $employee = Employee::where('emp_name', 'like', '%'.$request->emp_ctrl.'%');
            $deduction = Deduction::where('wd_desc', 'like', '%'.$ded.'%');
            $qty = 1;
            $amt = $amount * $qty;


            PLedger::create([
                'loc_code' => $employee->pluck('loc_code')->first(),
                'emp_dept' => $employee->pluck('emp_dept')->first(),
                'period' => $period->pluck('period')->first(),
                'wd_id' => $deduction->pluck('wd_id')->first(),
                'emp_ctrl' => $employee->pluck('emp_ctrl')->first(),
                'pdate' => Carbon::now("Asia/Manila")->format('Y-m-d H:i:s'),
                'reference' => strtoupper(Str::random(10)),
                'qty' => $qty,
                'rate' => $amount,
                'amount' => $amt,
            ]);

            // Save the values to the database or perform any other operations
        }


        return redirect()->route('ledger_deductions.create')->with('message', 'Employee Deduction/s Created Successfully!')->withInput(['period' => $request->period]);;

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
