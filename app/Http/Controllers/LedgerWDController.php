<?php

namespace App\Http\Controllers;

use App\Models\Deduction;
use App\Models\Employee;
use App\Models\Period;
use App\Models\PLedger;
use App\Models\WdRef;
use Illuminate\Http\Request;

class LedgerWDController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $periods = Period::all();
        $employees = Employee::all();
        $wage_deductions = WdRef::all();
        return view('p_ledger.wd.index', compact('periods', 'employees', 'wage_deductions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

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

    public function search(Request $request){


        $period = Period::where('pname', $request->period)->pluck('period')->first();
        $emp_ctrl = Employee::where('emp_name', $request->emp_ctrl)->pluck('emp_ctrl')->first();
        $wage_deductions = WdRef::all();
        $wds = PLedger::where('period', $period)
            ->where('emp_ctrl', $emp_ctrl)
            ->get();

        $emp_name = $request->emp_ctrl;
        $req_period = $request->period;

        $employees = Employee::all();

        return view('p_ledger.wd.show', compact('wds', 'emp_name', 'req_period', 'employees', 'wage_deductions'));

    }
}
