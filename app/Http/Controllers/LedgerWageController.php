<?php

namespace App\Http\Controllers;

use App\Models\wage;
use App\Models\Employee;
use App\Models\Period;
use App\Models\PLedger;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class LedgerWageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('p_ledger.wage.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $periods = Period::all();
        $employees = Employee::all();
        $wages = Wage::all();
        return view('p_ledger.wage.create', compact('periods', 'employees', 'wages'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {



        $this->validate($request, [
            'period' => 'required|exists:period,pname',
            'emp_ctrl' => 'required|exists:employee,emp_name',
            'wage' => 'required|array',
            'wage.*' => 'required|exists:wd_ref,wd_desc',
            'amount' => 'required|array',
            'amount.*' => 'required|numeric',
        ]);




        // Loop through the arrays and save the values one by one
        for ($i = 0; $i < count($request->wage); $i++) {

            $wg = $request->wage[$i];
            $amount = $request->amount[$i];


            $period = Period::where('pname', 'like', '%'.$request->period.'%');
            $employee = Employee::where('emp_name', 'like', '%'.$request->emp_ctrl.'%');
            $wage = Wage::where('wd_desc', 'like', '%'.$wg.'%');
            $qty = 1;
            $amt = $amount * $qty;


            PLedger::create([
                'loc_code' => $employee->pluck('loc_code')->first(),
                'emp_dept' => $employee->pluck('emp_dept')->first(),
                'period' => $period->pluck('period')->first(),
                'wd_id' => $wage->pluck('wd_id')->first(),
                'emp_ctrl' => $employee->pluck('emp_ctrl')->first(),
                'pdate' => Carbon::now("Asia/Manila")->format('Y-m-d H:i:s'),
                'reference' => strtoupper(Str::random(10)),
                'qty' => $qty,
                'rate' => $amount,
                'amount' => $amt,
            ]);

            // Save the values to the database or perform any other operations
        }


        return redirect()->route('ledger_wages.create')->with('message', 'Employee Wage/s Created Successfully!')->withInput(['period' => $request->period]);;

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
