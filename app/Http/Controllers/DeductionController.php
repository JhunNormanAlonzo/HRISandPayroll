<?php

namespace App\Http\Controllers;

use App\Models\Deduction;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DeductionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $deductions = Deduction::all();
        return view('deduction.index', compact('deductions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('deduction.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'wd_desc' => 'required',
            'wd_value' => 'required'
        ]);

        $input = $request->all();
        $input['iswage'] = 0;
        $input['istax'] = $request->istax ?? 0;
        $input['c_rate'] = $request->c_rate ?? "";
        $input['ex_annual'] = $request->ex_annual ?? 0;
        $input['wd_id'] = "_".strtoupper(Str::random(9));


        Deduction::create($input);

        return redirect()->route('deductions.index')->with('message', 'Deduction Created Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Deduction $deduction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Deduction $deduction)
    {
        return view('Deduction.edit', compact('deduction'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Deduction $deduction)
    {
        $this->validate($request, [
            'wd_desc' => 'required',
            'wd_value' => 'required'
        ]);
        $input = $request->all();
        $input['istax'] = $request->istax ?? 0;
        $input['c_rate'] = $request->c_rate ?? "";
        $input['ex_annual'] = $request->ex_annual ?? 0;

        $deduction->update($input);
        return redirect()->route('deductions.index')->with('message', 'Deduction Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Deduction $deduction)
    {
        $deduction->delete();
        return redirect()->route('deductions.index')->with('message', 'Deduction Deleted Successfully!');
    }
}
