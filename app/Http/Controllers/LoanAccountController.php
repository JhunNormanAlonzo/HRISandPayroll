<?php

namespace App\Http\Controllers;

use App\Models\Deduction;
use App\Models\Employee;
use App\Models\LoanAccount;
use App\Models\WdRef;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class LoanAccountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $loan_accounts = LoanAccount::all();
        return view('loan_account.index', compact('loan_accounts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $employees = Employee::all();
        $deductions = WdRef::all();
        return view('loan_account.create', compact('employees', 'deductions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'emp_ctrl' => 'required',
            'wd_id' => 'required',
            'la_date' => 'required',
            'description' => 'required',
            'reference' => 'required',
            'split' => 'required',
            'pay_amt' => 'required',
            'balance' => 'required',
            'split_val' => 'required',
            'loan_type' => 'required',
        ]);

        $input = $request->all();
        $input['emp_name'] = $request->emp_ctrl;
        $input['emp_ctrl'] = Employee::where('emp_name', $request->emp_ctrl)->pluck('emp_ctrl')->first();
        $input['isactive'] = $request->isactive ?? '0';
        $input['la_ctrl'] = "_".strtoupper(Str::random(9));

        LoanAccount::create($input);

        return redirect()->route('loan_accounts.index')->with('message', 'Loan Account Created Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(LoanAccount $loanAccount)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LoanAccount $loan_account)
    {
        $employees = Employee::all();
        $deductions = WdRef::all();
        return view('loan_account.edit', compact('loan_account', 'employees', 'deductions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, LoanAccount $loan_account)
    {
        $this->validate($request, [
            'emp_ctrl' => 'required',
            'wd_id' => 'required',
            'la_date' => 'required',
            'description' => 'required',
            'reference' => 'required',
            'split' => 'required',
            'pay_amt' => 'required',
            'balance' => 'required',
            'split_val' => 'required',
            'loan_type' => 'required',
        ]);

        $input = $request->all();
        $input['emp_name'] = $request->emp_ctrl;
        $input['emp_ctrl'] = Employee::where('emp_name', $request->emp_ctrl)->pluck('emp_ctrl')->first();
        $input['isactive'] = $request->isactive ?? '0';

        $loan_account->update($input);
        return redirect()->route('loan_accounts.index')->with('message', 'Loan Account Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LoanAccount $loan_account)
    {
        $loan_account->delete();
        return redirect()->route('loan_accounts.index')->with('message', 'Loan Account Deleted Successfully!');
    }
}
