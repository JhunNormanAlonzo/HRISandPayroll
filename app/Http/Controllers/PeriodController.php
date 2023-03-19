<?php

namespace App\Http\Controllers;

use App\Models\Period;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class PeriodController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $periods = Period::all();
        return view('period.index', compact('periods'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('period.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $date_from = Carbon::createFromFormat('Y-m-d', $input['pfrom']);
        $date_to = Carbon::createFromFormat('Y-m-d', $input['pto']);
        $input['period'] = "_".strtoupper(Str::random(9));
        $input['posted'] = $request->posted ?? '0';
        $input['closed'] = $request->closed ?? '0';
        $input['is30th'] = $request->is30th ?? '0';
        $input['logpro'] = $request->logpro ?? '0';
        $input['pname'] = $date_from->format('F d')." - ".$date_to->format('F d, Y');

        Period::create($input);
        return redirect()->route('periods.index')->with('message', 'Period Added Successfully!');

    }

    /**
     * Display the specified resource.
     */
    public function show(Period $period)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Period $period)
    {
        return view('period.edit', compact('period'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Period $period)
    {
        $input = $request->all();
        $date_from = Carbon::createFromFormat('Y-m-d', $input['pfrom']);
        $date_to = Carbon::createFromFormat('Y-m-d', $input['pto']);
        $input['posted'] = $request->posted ?? '0';
        $input['closed'] = $request->closed ?? '0';
        $input['is30th'] = $request->is30th ?? '0';
        $input['logpro'] = $request->logpro ?? '0';
        $input['pname'] = $date_from->format('F d')." - ".$date_to->format('F d, Y');
        $period->update($input);

        return redirect()->route('periods.index')->with('message', 'Period Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Period $period)
    {
        $period->delete();

        return redirect()->route('periods.index')->with('message', 'Period Deleted Successfully!');

    }
}
