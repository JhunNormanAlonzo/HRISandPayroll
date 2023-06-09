<?php

namespace App\Http\Controllers;

use App\Models\Wage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class WageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $wages = Wage::all();
        return view('wage.index', compact('wages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('wage.create');
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
        $input['iswage'] = 1;
        $input['istax'] = $request->istax ?? 0;
        $input['c_rate'] = $request->c_rate ?? "";
        $input['ex_annual'] = $request->ex_annual ?? 0;
        $input['wd_id'] = "_".strtoupper(Str::random(9));


        Wage::create($input);

        return redirect()->route('wages.index')->with('message', 'Salary/Wage Created Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Wage $wage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Wage $wage)
    {
        return view('wage.edit', compact('wage'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Wage $wage)
    {
        $this->validate($request, [
            'wd_desc' => 'required',
            'wd_value' => 'required'
        ]);
        $input = $request->all();
        $input['istax'] = $request->istax ?? 0;
        $input['c_rate'] = $request->c_rate ?? "";
        $input['ex_annual'] = $request->ex_annual ?? 0;

        $wage->update($input);
        return redirect()->route('wages.index')->with('message', 'Salary/Wage Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Wage $wage)
    {
        $wage->delete();
        return redirect()->route('wages.index')->with('message', 'Salary/Wage Deleted Successfully!');
    }
}
